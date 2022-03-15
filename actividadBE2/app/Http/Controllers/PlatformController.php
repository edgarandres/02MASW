<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Platform;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;

class PlatformController extends Controller
{
    const PAGINATE_SIZE = 15;

    public function index(Request $request){
        $platformName = null;
        if($request->has('platformName')){
            $platformName = $request->platformName;
            $platforms = Platform::where('name', 'like', '%'.$platformName . '%')
            ->orderBy('name', 'ASC')->paginate(self::PAGINATE_SIZE);
        }else{
            $platforms = Platform::orderBy('name', 'ASC')->paginate(self::PAGINATE_SIZE);
        }
        return view('platforms.index', ['platforms'=>$platforms, 'platformName'=>$platformName]);
    }

    public function create(){
        return view('platforms.store');
    }

    public function store(Request $request){
        $this->validatePlatform($request, null)->validate();

        $platform = new Platform();
        $platform->name = $request->platformName;
        $platform->save();

        return redirect()->route('platforms.index')->with('success', Lang::get('platform.platform_created_successfully'));
    }

    function validatePlatform($request, $platform){
        return Validator::make($request->all(), [
            'platformName' => ['required', 'string', 'max:255', 'min:3', Rule::unique('platforms','name')->ignore($platform)]
        ]);
    }

    public function delete(Platform $platform){
        if($platform!=null){
            $platform->delete();
            return redirect()->route('platforms.index')->with('success', Lang::get('platform.platform_deleted_successfully'));
        }
        return redirect()->route('platforms.index')->with('error', Lang::get('platform.platforms_deleted_error'));
    }

    public function edit(Platform $platform){
        //dd($platform->all());
        return view('platforms.store', ['platform' => $platform]);
    }

    public function update(Request $request, Platform $platform){

        $this->validatePlatform($request, $platform)->validate();
        $platform->name = $request->platformName;
        $platform->save();
        return redirect()->route('platforms.index')->with('success', Lang::get('platform.platform_updated_successfully'));
    }
}
