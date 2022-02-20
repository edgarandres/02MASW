<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Platform;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class PlatformController extends Controller
{
    const PAGINATE_SIZE = 5;

    public function index(Request $request){
        $platformName = null;
        if($request->has('platformName')){
            $platformName = $request->platformName;
            $platforms = Platform::where('name', 'like', '%'.$platformName . '%')
            ->orderBy('name', 'ASC')->paginate(self::PAGINATE_SIZE);

        }else{
            $platforms = Platform::orderBy('name', 'ASC')->paginate(self::PAGINATE_SIZE);
        }

        return view('platforms.index', ['platforms'=>$platforms]);
    }

    public function create(){
        return view('platforms.store');
    }

    public function store(Request $request){
        $this->validatePlatform($request)->validate();

        $platform = new Platform();
        $platform->name = $request->platformName;
        $platform->save();

        return redirect()->route('platforms.index')->with('success', Lang::get('alerts.platform_created_successfully'));
    }

    public function edit(Platform $platform){
      //  dd($platform->all());
        return view('platforms.store', ['platform' => $platform]);
    }

    public function update(Request $request, Platform $platform){

        $this->validatePlatform($request)->validate();
        $platform->name = $request->platformName;
        $platform->save();
        return redirect()->route('platforms.index')->with('success', Lang::get('alerts.platform_updated_successfully'));
    }

    public function delete(Platform $platform){
        if($platform!=null){
            $platform->delete();
            return redirect()->route('platforms.index')->with('success', Lang::get('alerts.platform_deleted_successfully'));
        }
        return redirect()->route('platforms.index')->with('error', Lang::get('alerts.platforms_deleted_error'));
    }

    function validatePlatform($request){
        return Validator::make($request->all(), [
            'platformName' => ['required', 'string', 'max:255', 'min:3']
        ]);
    }
}