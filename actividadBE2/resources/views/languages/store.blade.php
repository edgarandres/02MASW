@extends('layouts.general')

@section('cabeza')
@isset($language)
    @include('layouts.head',['title'=> __('language.edit_title')])
@else
    @include('layouts.head',['title'=> __('language.create_title')])
@endisset
@endsection


@section('titulo')
@isset($language)
    {{__('language.edit_title')}}
@else
    {{__('language.create_title')}}
@endisset
@endsection

@section('contenido')
    <div class="row-mb-5">
        <div class="col">
            <div class="card-shadow">
                <div class="card-header border-0">
                    <div class="row">
                    @isset($language)
                        <h1>{{__('strings.edit')}}</h1>
                    @else
                        <h1>{{__('strings.create')}}</h1>
                    @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($language)
                    <form name="edit_language" action={{route('languages.update', $language)}} method="POST">
                    @else
                    <form name="create_language" action="{{route('languages.store')}}" method="POST">
                    @endif
                        @csrf
                        <div class="mb-3">
                            <label for="languageName" class="form-label">{{__('strings.name')}}
                                @error('languageName')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>
                            <input id="languageName" name="languageName" type="text" placeholder="{{__('language.name_placeholder')}}"
                            class="form-control @error('languageName') is-invalid @enderror" required
                                @isset($language) value="{{old('languageName', $language->name)}}" @else value="{{old('languageName')}}"
                                @endisset
                            />
                            <label for="languageIso" class="form-label">{{__('language.iso_code')}}
                                @error('languageIso')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>
                            <input id="languageIso" name="languageIso" type="text" placeholder="{{__('language.iso_placeholder')}}"
                            class="form-control @error('languageIso') is-invalid @enderror" required
                                @isset($language) value="{{old('languageIso', $language->iso_code)}}" @else value="{{old('languageIso')}}"
                                @endisset
                            />
                        </div>
                        <input type="submit"
                        @isset($language)
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
