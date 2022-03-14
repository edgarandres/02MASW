@extends('layouts.general')

@section('cabeza')
@include('layouts.head',['title'=>__('director.list_title')])
@endsection

@section('contenido')

<h2>{{__('director.list_title')}}</h2>

@include('layouts.alert')

<a href="{{route('directors.create')}}">{{__('director.create_directors')}}</a>
<div class="form-group">
    <form action="{{route('directors.index')}}" method="post">
        @csrf
        <input type="text" name="directorName" placeholder="{{__('director.search_director_name_placeholder')}}">
        <button type="submit" class="btn btn-primary mb-2" >{{__('strings.filter')}}</button>
    </form>
</div>

@if(count($directors)>0)
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('director.name_header')}}</th>
        <th scope="col">{{__('director.surnames_header')}}</th>
        <th scope="col">{{__('director.country_header')}}</th>
        <th scope="col">{{__('director.birth_date_header')}}</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($directors as $director)
        <tr>
            <td >{{$director['id']}}</td>
            <td>{{ $director['given_name'] }}</td>
            <td>{{ $director['surnames'] }}</td>
            <td>{{ $director['country'] }}</td>
            <td>{{ $director['birth_date'] }}</td>
            <td >
                <a class="btn btn-success" href="{{ route('directors.edit', $director) }}">
                    {{__('strings.edit')}}
                </a>
            </td>
            <td>
                <form id="delete-form-{{$director->id}}" class="delete-btn" action="{{ route('directors.delete', [$director])}}"
                    method="POST" style="display: index-block;">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" href="javascript:void(0);"
                        onlick="event.preventDefault()
                        document.getElementById('delete-form-{{$director->id}}').submit()">
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
    {{__('director.no_items')}}
</div>
@endif

@endsection
