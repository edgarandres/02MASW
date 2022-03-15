<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Actor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ActorController extends Controller
{
    const PAGINATE_SIZE = 15;

    public function index(Request $request){
        $actorName = null;
        if($request->has('actorName')){
            $actorName = $request->actorName;
            $actors = Actor::where('given_name', 'like', '%'.$actorName . '%')
            ->orderBy('name', 'ASC')->paginate(self::PAGINATE_SIZE);
        }else{
            $actors = Actor::orderBy('given_name', 'ASC')->paginate(self::PAGINATE_SIZE);
        }
        return view('actors.index', ['actors'=>$actors, 'actorName'=>$actorName]);
    }

    public function create(){
        return view('actors.store');
    }

    public function store(Request $request){
        $this->validateActor($request)->validate();

        $actor = new Actor();
        $actor->given_name = $request->actorName;
        $actor->surnames = $request->actorSurnames;
        $actor->country = $request->actorCountry;
        $actor->birth_date = $request->actorBirthDate;
        $actor->save();

        return redirect()->route('actors.index')->with('success', Lang::get('actor.actor_created_successfully'));
    }

    function validateActor($request){ //NO OLVIDAR CAMBIAR
        return Validator::make($request->all(), [
            'actorName' => ['required', 'string', 'max:255', 'min:3', "regex:/^[A-Z](?:[a-z]|['-][a-z]){1,19}( [A-Z](?:[a-z]|['-][a-z]){1,19})*$/"],
            'actorSurnames' => ['required', 'string', 'max:255', 'min:3', "regex:/^[A-Z](?:[a-z]|['-][a-z]){1,19}( [A-Z](?:[a-z]|['-][a-z]){1,19})*$/"],
            'actorCountry' => ['required', 'string', 'max:255', 'min:3', "regex:/^[A-Z](?:[a-z]|['-][az]){1,19}$/"],
            'actorBirthDate'=>['required', 'date']
        ]);
    }

    public function delete(Actor $actor){
        if($actor!=null){
            $actor->delete();
            return redirect()->route('actors.index')->with('success', Lang::get('actor.actor_deleted_successfully'));
        }
        return redirect()->route('actors.index')->with('error', Lang::get('actor.actors_deleted_error'));
    }

    public function edit(Actor $actor){
        //dd($actor->all());
        return view('actors.store', ['actor' => $actor]);
    }

    public function update(Request $request, Actor $actor){

        $this->validateActor($request)->validate();
        $actor->given_name = $request->actorName;
        $actor->surnames = $request->actorSurnames;
        $actor->country = $request->actorCountry;
        $actor->birth_date = $request->actorBirthDate;
        $actor->save();
        return redirect()->route('actors.index')->with('success', Lang::get('actor.actor_updated_successfully'));
    }
}
