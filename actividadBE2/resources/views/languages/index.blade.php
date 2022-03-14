@extends('layouts.general')

@section('cabeza')
@include('layouts.head',['title'=>__('language.list_title')])
@endsection

@section('contenido')

<h2>{{__('language.list_title')}}</h2>

@include('layouts.alert')

<a href="{{route('languages.create')}}">{{__('language.create_languages')}}</a>
<div class="form-group">
    <form action="{{route('languages.index')}}" method="post">
        @csrf
        <input type="text" name="languageName" placeholder="{{__('language.search_language_name_placeholder')}}">
        <button type="submit" class="btn btn-primary mb-2" >{{__('strings.filter')}}</button>
    </form>
</div>

@if(count($languages)>0)
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('language.language_name_header')}}</th>
        <th scope="col">{{__('language.language_iso_header')}}</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($languages as $language)
        <tr>
            <td >{{$language['id']}}</td>
            <td>{{ $language['name'] }}</td>
            <td>{{ $language['iso_code'] }}</td>
            <td >
                <a class="btn btn-success" href="{{ route('languages.edit', $language) }}">
                    {{__('strings.edit')}}
                </a>
            </td>
            <td>
                <form id="delete-form-{{$language->id}}" class="delete-btn" action="{{ route('languages.delete', [$language])}}"
                    method="POST" style="display: index-block;">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" href="javascript:void(0);"
                        onlick="event.preventDefault()
                        document.getElementById('delete-form-{{$language->id}}').submit()">
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
    {{__('language.no_items')}}
</div>
@endif

@endsection
