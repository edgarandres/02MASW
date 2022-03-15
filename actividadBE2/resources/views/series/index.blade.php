@extends('layouts.general')

@section('cabeza')
@include('layouts.head',['title'=>__('serie.list_title')])
@endsection

@section('contenido')

<h2>{{__('serie.list_title')}}</h2>

@include('layouts.alert')

<a href="{{route('series.create')}}">{{__('serie.create_series')}}</a>
<div class="form-group">
    <form action="{{route('series.index')}}" method="post">
        @csrf
        <input type="text" name="serieName" placeholder="{{__('serie.search_serie_name_placeholder')}}">
        <button type="submit" class="btn btn-primary mb-2" >{{__('strings.filter')}}</button>
    </form>
</div>

@if(count($series)>0)
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('serie.title')}}</th>
        <th scope="col">{{__('serie.platform')}}</th>
        <th scope="col">{{__('serie.director')}}</th>
        <th scope="col">{{__('serie.actors')}}</th>
        <th scope="col">{{__('serie.audios')}}</th>
        <th scope="col">{{__('serie.subtitles')}}</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($series as $serie)
        <tr>
            <td >{{$serie['id']}}</td>
            <td>{{ $serie['title'] }}</td>
            <td>{{ $serie['platform']->name}}</td>
            <td>{{ $serie['director']->given_name.' '.$serie['director']->surnames}}</td>
            <td>
                <ol>
                    @foreach($serie['actors'] as $actor)
                    <li>{{$actor->given_name.' '.$actor->surnames}}</li>
                    @endforeach
                </ol>
            </td>
            <td>
                <ol>
                    @foreach($serie['audioLanguages'] as $audio)
                    <li>{{$audio->name}}</li>
                    @endforeach
                </ol>
            </td>
            <td>
                <ol>
                    @foreach($serie['subtitleLanguages'] as $subtitle)
                    <li>{{$subtitle->name}}</li>
                    @endforeach
                </ol>
            </td>
            <td >
                <a class="btn btn-success" href="{{ route('series.edit', $serie) }}">
                    {{__('strings.edit')}}
                </a>
            </td>
            <td>
                <form id="delete-form-{{$serie->id}}" class="delete-btn" action="{{ route('series.delete', [$serie])}}"
                    method="POST" style="display: index-block;">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" href="javascript:void(0);"
                        onlick="event.preventDefault()
                        document.getElementById('delete-form-{{$serie->id}}').submit()">
                        {{__('strings.delete')}}
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div class="alert alert-warning mt-3">
    {{__('serie.no_items')}}
</div>
@endif

@endsection
