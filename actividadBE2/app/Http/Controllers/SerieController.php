<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Serie;
use App\Actor;
use App\Director;
use App\Platform;
use App\Language;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;


class SerieController extends Controller
{
    const PAGINATE_SIZE = 15;
    public function index(Request $request){
        $serieName = null;
        if($request->has('serieName')){
            $serieName = $request->serieName;
            $series = Serie::where('title', 'like', '%'.$serieName . '%')
            ->orderBy('title','ASC')->paginate(self::PAGINATE_SIZE);
        }else{
            $series = Serie::orderBy('title', 'ASC')->paginate(self::PAGINATE_SIZE);
        }
        return view('series.index', ['series'=>$series, 'serieName'=>$serieName]);
    }

    public function create(){
        $directors=Director::all();
        $actors=Actor::all();
        $platforms=Platform::all();
        $languages=Language::all();
        return view('series.store', ['platforms'=>$platforms,'directors'=>$directors, 'actors'=>$actors, 'languages'=>$languages]);
    }

    public function store(Request $request){
        $serie = new Serie();
        $this->validateSerie($request, $serie)->validate();
        $serie->title=$request->serieName;
        $serie->platform()->associate(Platform::find($request->seriePlatform));
        $serie->director()->associate(Director::find($request->serieDirector));
        $serie->save();

        foreach($request->serieActors as $actor){
            $serie->actors()->attach(Actor::find($actor));
        }

        foreach($request->serieAudios as $audio){
            $serie->audioLanguages()->attach(Language::find($audio));
        }

        foreach($request->serieSubtitles as $subtitle){
            $serie->subtitleLanguages()->attach(Language::find($subtitle));
        }

        $serie->save();

        return redirect()->route('series.index')->with('success', Lang::get('serie.serie_created_successfully'));
    }


    public function delete(Serie $serie){
        if($serie!=null){
            $serie->delete();
            return redirect()->route('series.index')->with('success', Lang::get('serie.serie_deleted_successfully'));
        }
        return redirect()->route('series.index')->with('error', Lang::get('serie.series_deleted_error'));
    }

    public function edit(Serie $serie){
        $directors=Director::all();
        $actors=Actor::all();
        $platforms=Platform::all();
        $languages=Language::all();
        return view('series.store', ['serie' => $serie, 'platforms'=>$platforms,'directors'=>$directors, 'actors'=>$actors, 'languages'=>$languages]);
    }

    public function update(Request $request, Serie $serie){
        $this->validateSerie($request,$serie)->validate();
        $serie->title=$request->serieName;
        $serie->platform()->associate(Platform::find($request->seriePlatform));
        $serie->director()->associate(Director::find($request->serieDirector));

        $serie->detachAllActors();
        $serie->detachAllAudioLanguages();
        $serie->detachAllSubtitleLanguages();
        foreach($request->serieActors as $actor){
            $serie->actors()->attach(Actor::find($actor));
        }

        foreach($request->serieAudios as $audio){
            $serie->audioLanguages()->attach(Language::find($audio));
        }

        foreach($request->serieSubtitles as $subtitle){
            $serie->subtitleLanguages()->attach(Language::find($subtitle));
        }

        $serie->save();
        return redirect()->route('series.index')->with('success', Lang::get('serie.serie_updated_successfully'));
    }

    
    function validateSerie($request, $serie){
        return Validator::make($request->all(), [
            'serieName' => [
                'required', 
                'string',
                Rule::unique('series','title')->ignore($serie)
            ]
        ]);
    }
}
