@extends('layouts.general')

@section('cabeza')
@isset($director)
    @include('layouts.head',['title'=> __('director.edit_title')])
@else
    @include('layouts.head',['title'=> __('director.create_title')])
@endisset
@endsection


@section('titulo')
@isset($director)
    {{__('director.edit_title')}}
@else
    {{__('director.create_title')}}
@endisset
@endsection

@section('contenido')
    <div class="row-mb-5">
        <div class="col">
            <div class="card-shadow">
                <div class="card-header border-0">
                    <div class="row">
                    @isset($director)
                        <h1>{{__('strings.edit')}}</h1>
                    @else
                        <h1>{{__('strings.create')}}</h1>
                    @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($director)
                    <form name="edit_director" action={{route('directors.update', $director)}} method="POST">
                    @else
                    <form name="create_director" action="{{route('directors.store')}}" method="POST">
                    @endif
                        @csrf
                        <div class="mb-3">
                            <label for="directorName" class="form-label">{{__('strings.name')}}
                                @error('directorName')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>
                            <input id="directorName" name="directorName" type="text" placeholder="{{__('director.name_placeholder')}}"
                            class="form-control @error('directorName') is-invalid @enderror" required
                                @isset($director) value="{{old('directorName', $director->given_name)}}" @else value="{{old('directorName')}}"
                                @endisset
                            />

                            <label for="directorSurnames" class="form-label">{{__('director.surnames_header')}}
                                @error('directorSurnames')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>
                            <input id="directorSurnames" name="directorSurnames" type="text" placeholder="{{__('director.surnames_placeholder')}}"
                            class="form-control @error('directorSurnames') is-invalid @enderror" required
                                @isset($director) value="{{old('directorSurnames', $director->surnames)}}" @else value="{{old('directorSurnames')}}"
                                @endisset
                            />

                            <label for="directorCountry" class="form-label">{{__('director.country_header')}}
                                @error('directorCountry')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>
                            <input id="directorCountry" name="directorCountry" type="text" placeholder="{{__('director.country_placeholder')}}"
                            class="form-control @error('directorCountry') is-invalid @enderror" required
                                @isset($director) value="{{old('directorCountry', $director->country)}}" @else value="{{old('directorCountry')}}"
                                @endisset
                            />

                            <label for="directorBirthDate" class="form-label">{{__('director.birth_date_header')}}
                                @error('directorBirthDate')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>
                            <input id="directorBirthDate" name="directorBirthDate" type="date" placeholder="{{__('director.birth_date_placeholder')}}"
                            class="form-control @error('directorBirthDate') is-invalid @enderror" required
                                @isset($director) value="{{old('directorBirthDate', $director->birth_date)}}" @else value="{{old('directorBirthDate')}}"
                                @endisset
                            />

                        </div>
                        <input type="submit"
                        @isset($director)
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
