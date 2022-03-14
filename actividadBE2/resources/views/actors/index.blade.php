@extends('layouts.general')

@section('cabeza')
@include('layouts.head',['title'=>__('actor.list_title')])
@endsection

@section('contenido')

<h2>{{__('actor.list_title')}}</h2>

@include('layouts.alert')

<a href="{{route('actors.create')}}">{{__('actor.create_title')}}</a>
<div class="form-group">
    <form action="{{route('actors.index')}}" method="post">
        @csrf
        <input type="text" name="actorName" placeholder="{{__('actor.search_actor_name_placeholder')}}">
        <button type="submit" class="btn btn-primary mb-2" >{{__('strings.filter')}}</button>
    </form>
</div>

@if(count($actors)>0)
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('actor.actor_name_header')}}</th>
        <th scope="col">{{__('actor.surnames_header')}}</th>
        <th scope="col">{{__('actor.country_header')}}</th>
        <th scope="col">{{__('actor.birth_date_header')}}</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($actors as $actor)
        <tr>
            <td >{{$actor['id']}}</td>
            <td>{{ $actor['given_name'] }}</td>
            <td>{{ $actor['surnames'] }}</td> 
            <td>{{ $actor['country'] }}</td>
            <td>{{ fecha($actor['birth_date']) }}</td>
            <td >
                <a class="btn btn-success" href="{{ route('actors.edit', $actor) }}">
                    {{__('strings.edit')}}
                </a>
            </td>
            <td>
                <form id="delete-form-{{$actor->id}}" class="delete-btn" action="{{ route('actors.delete', [$actor])}}"
                    method="POST" style="display: index-block;">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" href="javascript:void(0);"
                        onlick="event.preventDefault()
                        document.getElementById('delete-form-{{$actor->id}}').submit()">
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
    {{__('actor.no_items')}}
</div>
@endif

@endsection
