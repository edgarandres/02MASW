@extends('layouts.general')

@section('cabeza')
@include('layouts.head',['title'=>__('platform.list_title')])
@endsection

@section('contenido')

<h2>{{__('platform.list_title')}}</h2>

@include('layouts.alert')

<a href="{{route('platforms.create')}}">{{__('platform.create_platforms')}}</a>
<div class="form-group">
    <form action="{{route('platforms.index')}}" method="post">
        @csrf
        <input type="text" name="platformName" placeholder="{{__('platform.search_platform_name_placeholder')}}">
        <button type="submit" class="btn btn-primary mb-2" >{{__('strings.filter')}}</button>
    </form>
</div>

@if(count($platforms)>0)
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{__('platform.platform_name_header')}}</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach($platforms as $platform)
        <tr>
            <td >{{$platform['id']}}</td>
            <td>{{ $platform['name'] }}</td>
            <td >
                <a class="btn btn-success" href="{{ route('platforms.edit', $platform) }}">
                    {{__('strings.edit')}}
                </a>
            </td>
            <td>
                <form id="delete-form-{{$platform->id}}" class="delete-btn" action="{{ route('platforms.delete', [$platform])}}"
                    method="POST" style="display: index-block;">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" href="javascript:void(0);"
                        onlick="event.preventDefault()
                        document.getElementById('delete-form-{{$platform->id}}').submit()">
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
    {{__('platform.no_items')}}
</div>
@endif

@endsection
