<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Language;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;

class LanguageController extends Controller
{
    const PAGINATE_SIZE = 15;

    public function index(Request $request){
        $languageName = null;
        if($request->has('languageName')){
            $languageName = $request->languageName;
            $languages = Language::where('name', 'like', '%'.$languageName . '%')
            ->orderBy('name', 'ASC')->paginate(self::PAGINATE_SIZE);
        }else{
            $languages = Language::orderBy('name', 'ASC')->paginate(self::PAGINATE_SIZE);
        }
        return view('languages.index', ['languages'=>$languages, 'languageName'=>$languageName]);
    }

    public function create(){
        return view('languages.store');
    }

    public function store(Request $request){
        $this->validateLanguage($request,  null)->validate();

        $language = new Language();
        $language->name = $request->languageName;
        $language->iso_code = $request->languageIso;
        $language->save();

        return redirect()->route('languages.index')->with('success', Lang::get('language.language_created_successfully'));
    }

    function validateLanguage($request, $language){
        return Validator::make($request->all(), [
            'languageName' => ['required', 'string', 'max:255', 'min:3', "regex:/^[A-Z](?:[a-z]|['-][a-z]){1,19}( [A-Z](?:[a-z]|['-][a-z]){1,19})*$/",
             Rule::unique('languages','name')->ignore($language)],
            'languageIso'=>['required', 'string', 'max:2', 'min:2', 'regex:/^([a-z]{2})$/',
             Rule::unique('languages','iso_code')->ignore($language)]
        ]);
    }

    public function delete(Language $language){
        if($language!=null){
            $language->delete();
            return redirect()->route('languages.index')->with('success', Lang::get('language.language_deleted_successfully'));
        }
        return redirect()->route('languages.index')->with('error', Lang::get('language.languages_deleted_error'));
    }

    public function edit(Language $language){
        //dd($language->all());
        return view('languages.store', ['language' => $language]);
    }

    public function update(Request $request, Language $language){

        $this->validateLanguage($request, $language)->validate();
        $language->name = $request->languageName;
        $language->iso_code = $request->languageIso;
        $language->save();
        return redirect()->route('languages.index')->with('success', Lang::get('language.language_updated_successfully'));
    }
}
