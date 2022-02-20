@extends('layouts.main')

@section('title')
@isset($platform)    
    {{__('strings.edit_title')}}
@else
    {{__('strings.create_title')}}
@endisset
@endsection

@section('content')
    <div class="row-mb-5">
        <div class="col">
            <div class="card-shadow">
                <div class="card-header border-0">
                    <div class="row">
                    @isset($platform)    
                        <h1>{{__('strings.edit_title')}}</h1>
                    @else
                        <h1>{{__('strings.create_title')}}</h1>
                    @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($platform)    
                    <form name="edit_platform" action={{route('platforms.update', $platform)}} method="POST">
                    @else
                    <form name="create_platform" action="{{route('platforms.store')}}" method="POST">
                    @endif
                        @csrf
                        <div class="mb-3">
                            <label for="platformName" class="form-label">{{__('strings.name_header')}}</label>
                            <input id="platformName" name="platformName" type="text" placeholder="{{__('string.name_placeholder')}}"
                            class="form-control" required
                                @isset($platform) value="{{old('platformName', $platform->name)}}" @else value="{{old('platformName')}}"
                                @endisset
                            />
                        </div>
                        <input type="submit" 
                        @isset($platform)    
                            value="{{__('strings.edit_btn')}}" 
                        @else
                            value="{{__('strings.create_btn')}}"
                        @endif
                        class="btn btn-primary" name="editBtn"/>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

