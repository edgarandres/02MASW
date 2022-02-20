@extends('layouts.main')

@section('title')
    {{__('strings.list_title')}}
@endsection

@section('content')
    <div class="row-mb-5">
        <div class="col">
            <div class="card-shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <h1>{{__('strings.create_title')}}</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form name="create_platform" action={{route('platforms.store')}} methid="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="platformName" class="form-label">{{__('strings.hname_header')}}</label>
                            <input id="platformName" name="platformName" type="text" placeholder="{{__('string.name_placeholder')}}"
                            class="form-control" required
                                @isset($platform) value="{{old('platformName', $platform->name)}}" @else value="{{old('platformName')}}"
                                @endisset
                            />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

