<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Platform;
use Illuminate\Support\Facades\Validator;

class PlatformController extends Controller
{
    const PAGINATE_SIZE = 10;

    public function index(){
        $platforms = Platform::paginate(self::PAGINATE_SIZE);
        return view('platforms.index', ['platforms'=>$platforms]);
    }

    public function create(){
        
    }

    public function store(Request $request){
        $this->validatePlatform(request)->validate();
    }

    public function edit(Platform $platform){}

    public function update(Request $request, Platform $platform){}

    public function delete(Request $request, Platform $platform){}

    function validatePlatform($request){
        return Validator::make($request->all(), [
            'platformName' => ['required', 'string', 'max:255', 'min:1']
        ]);
    }
}