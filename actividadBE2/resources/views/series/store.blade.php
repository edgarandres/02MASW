@extends('layouts.general')

@section('cabeza')
@isset($serie)
    @include('layouts.head',['title'=> __('serie.edit_title')])
@else
    @include('layouts.head',['title'=> __('serie.create_title')])
@endisset
@endsection


@section('titulo')
@isset($serie)
    {{__('serie.edit_title')}}
@else
    {{__('serie.create_title')}}
@endisset
@endsection

@section('contenido')
    <div class="row-mb-5">
        <div class="col">
            <div class="card-shadow">
                <div class="card-header border-0">
                    <div class="row">
                    @isset($serie)
                        <h1>{{__('strings.edit')}}</h1>
                    @else
                        <h1>{{__('strings.create')}}</h1>
                    @endisset
                    </div>
                </div>
                <div class="card-body">
                    @isset($serie)
                    <form name="edit_serie" action={{route('series.update', $serie)}} method="POST">
                    @else
                    <form name="create_serie" action="{{route('series.store')}}" method="POST">
                    @endif
                        @csrf
                        <div class="mb-3">
                            <label for="serieName" class="form-label">{{__('serie.title')}}
                                @error('serieName')
                                    <strong style="color: red">{{__('strings.error_value')}}</strong>
                                @enderror
                            </label>

                            <input id="serieName" name="serieName" type="text" placeholder="{{__('serie.name_placeholder')}}"
                            class="form-control @error('serieName') is-invalid @enderror" required
                                @isset($serie) value="{{old('serieName', $serie->title)}}" @else value="{{old('serieName')}}"
                                @endisset
                            />

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">{{__('serie.platform')}}</label>
                                <select name="seriePlatform" class="form-control" id="exampleFormControlSelect1" required>
                                    @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">{{__('serie.director')}}</label>
                                <select name="serieDirector" class="form-control" id="exampleFormControlSelect1" required>
                                    @foreach ($directors as $director)
                                    <option value="{{$director->id}}">{{$director->given_name.' '.$director->surnames}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect2">{{__('serie.select_actors')}}</label>
                                <select name="serieActors[]" multiple class="form-control" id="exampleFormControlSelect2" required>
                                    @foreach ($actors as $actor)
                                    <option value="{{$actor->id}}">{{$actor->given_name.' '.$actor->surnames}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect2">{{__('serie.select_audios')}}</label >
                                <select name="serieAudios[]" multiple class="form-control" id="exampleFormControlSelect2"required>
                                    @foreach ($languages as $language)
                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect2">{{__('serie.select_subtitles')}}</label>
                                <select name="serieSubtitles[]" multiple class="form-control" id="exampleFormControlSelect2" required>
                                    @foreach ($languages as $language)
                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>



                        </div>
                        <input type="submit"
                        @isset($serie)
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
