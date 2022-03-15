<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Director;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class DirectorController extends Controller
{
    const PAGINATE_SIZE = 15;

    public function index(Request $request){
        $directorName = null;
        if($request->has('directorName')){
            $directorName = $request->directorName;
            $directors = Director::where('given_name', 'like', '%'.$directorName . '%')
            ->orderBy('name', 'ASC')->paginate(self::PAGINATE_SIZE);
        }else{
            $directors = Director::orderBy('given_name', 'ASC')->paginate(self::PAGINATE_SIZE);
        }
        return view('directors.index', ['directors'=>$directors, 'directorName'=>$directorName]);
    }

    public function create(){
        return view('directors.store');
    }

    public function store(Request $request){
        $this->validateDirector($request)->validate();

        $director = new Director();
        $director->given_name = $request->directorName;
        $director->surnames = $request->directorSurnames;
        $director->country = $request->directorCountry;
        $director->birth_date = $request->directorBirthDate;
        $director->save();

        return redirect()->route('directors.index')->with('success', Lang::get('director.director_created_successfully'));
    }

    function validateDirector($request){
        return Validator::make($request->all(), [
            'directorName' => ['required', 'string', 'max:255', 'min:3', "regex:/^[A-Z](?:[a-z]|['-][a-z]){1,19}( [A-Z](?:[a-z]|['-][a-z]){1,19})*$/"],
            'directorSurnames' => ['required', 'string', 'max:255', 'min:3', "regex:/^[A-Z](?:[a-z]|['-][a-z]){1,19}( [A-Z](?:[a-z]|['-][a-z]){1,19})*$/"],
            'directorCountry' => ['required', 'string', 'max:255', 'min:3', "regex:/^[A-Z](?:[a-z]|['-][az]){1,19}$/"],
            'directorBirthDate'=>['required', 'date']
        ]);
    }

    public function delete(Director $director){
        if($director!=null){
            $director->delete();
            return redirect()->route('directors.index')->with('success', Lang::get('director.director_deleted_successfully'));
        }
        return redirect()->route('directors.index')->with('error', Lang::get('director.directors_deleted_error'));
    }

    public function edit(Director $director){
        //dd($director->all());
        return view('directors.store', ['director' => $director]);
    }

    public function update(Request $request, Director $director){

        $this->validateDirector($request)->validate();
        $director->given_name = $request->directorName;
        $director->surnames = $request->directorSurnames;
        $director->country = $request->directorCountry;
        $director->birth_date = $request->directorBirthDate;
        $director->save();
        return redirect()->route('directors.index')->with('success', Lang::get('director.director_updated_successfully'));
    }
}
