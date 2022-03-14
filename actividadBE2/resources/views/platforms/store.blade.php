@extends('layouts.general')

@section('cabeza')
@isset($platform)
    @include('layouts.head',['title'=> __('platform.edit_title')])
@else
    @include('layouts.head',['title'=> __('platform.create_title')])
@endisset
@endsection


@section('titulo')
@isset($platform)
    {{__('platform.edit_title')}}
@else
    {{__('platform.create_title')}}
@endisset
@endsection

@section('contenido')
    <div class="row-mb-5">
        <div class="col">
            <div class="card-shadow">
                <div class="card-header border-0">
                    <div class="row">
                    @isset($platform)
                        <h1>{{__('strings.edit')}}</h1>
                    @else
                        <h1>{{__('strings.create')}}</h1>
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
                            <label for="platformName" class="form-label">{{__('strings.name')}}
                                @error('platformName')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>
                            <input id="platformName" name="platformName" type="text" placeholder="{{__('platform.name_placeholder')}}"
                            class="form-control @error('platformName') is-invalid @enderror" required
                                @isset($platform) value="{{old('platformName', $platform->name)}}" @else value="{{old('platformName')}}"
                                @endisset
                            />
                        </div>
                        <input type="submit"
                        @isset($platform)
                            value="{{__('strings.edit')}}"
                        @else
                            value="{{__('strings.create')}}"
                        @endif
                        class="btn btn-primary" name="editBtn"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
