@extends('layouts.general')

@section('cabeza')
@isset($actor)
    @include('layouts.head',['title'=> __('actor.edit_title')])
@else
    @include('layouts.head',['title'=> __('actor.create_title')])
@endisset
@endsection


@section('titulo')
@isset($actor)
    {{__('actor.edit_title')}}
@else
    {{__('actor.create_title')}}
@endisset
@endsection

@section('contenido')
    <div class="row-mb-5">
        <div class="col">
            <div class="card-shadow">
                <div class="card-header border-0">
                    <div class="row">
                    @isset($actor)
                        <h1>{{__('strings.edit')}}</h1>
                    @else
                        <h1>{{__('strings.create')}}</h1>
                    @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($actor)
                    <form name="edit_actor" action={{route('actors.update', $actor)}} method="POST">
                    @else
                    <form name="create_actor" action="{{route('actors.store')}}" method="POST">
                    @endif
                        @csrf



                        <div class="mb-3">
                            <label for="actorName" class="form-label">{{__('strings.name')}}
                                @error('actorName')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>

                            <input id="actorName" name="actorName" type="text" placeholder="{{__('actor.name_placeholder')}}"
                            class="form-control @error('actorName') is-invalid @enderror" required
                                @isset($actor) value="{{old('actorName', $actor->given_name)}}" @else value="{{old('actorName')}}"
                                @endisset
                            />

                            <label for="actorSurnames" class="form-label">{{__('actor.surnames_header')}}
                                    @error('actorSurnames')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>
                            <input id="actorSurnames" name="actorSurnames" type="text" placeholder="{{__('actor.surnames_placeholder')}}"
                            class="form-control @error('actorSurnames') is-invalid @enderror" required
                                @isset($actor) value="{{old('actorSurnames', $actor->surnames)}}" @else value="{{old('actorSurnames')}}"
                                @endisset
                            />

                            <label for="actorCountry" class="form-label">{{__('actor.country_header')}}
                                    @error('actorCountry')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>
                            <input id="actorCountry" name="actorCountry" type="text" placeholder="{{__('actor.country_placeholder')}}"
                            class="form-control @error('actorCountry') is-invalid @enderror" required
                                @isset($actor) value="{{old('actorCountry', $actor->country)}}" @else value="{{old('actorCountry')}}"
                                @endisset
                            />

                            <label for="actorBirthDate" class="form-label">{{__('actor.birth_date_header')}}
                                    @error('actorBirthDate')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>
                            <input id="actorBirthDate" name="actorBirthDate" type="date"
                            class="form-control @error('actorBirthDate') is-invalid @enderror" required
                                @isset($actor) value="{{old('actorBirthDate', $actor->birth_date)}}" @else value="{{old('actorBirthDate')}}"
                                @endisset
                            />





                        </div>
                        <input type="submit"
                        @isset($actor)
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
