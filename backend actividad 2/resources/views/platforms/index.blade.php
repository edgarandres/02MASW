@extends('layouts.main')

@section('title')
    {{__('strings.platform_index_title')}})
@endsection

@section('content')

<div>
    <div class="row mb-5">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row">
                    <h1>{{__('strings.list_title')}}</h1>
                </div>
                <div class="row">
                    <a class="header_link btn btn-sm btn-success" href="{{ route('platforms.create')}}">{{__('strings.create_platforms')}}
                    &nbsp;<i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Formulario de busqueda
    <div class="card-body">
            <div class="col-md-6">
                <form action="" method="POST">
                    @csrf
                    <input id="platformName" name="platformName" class="form-control" value="@isset($platformName) {{$platformName}}@endisset"
                    placeholder="{{__('strings.search_platform_name_placeholder')}}"/>
                    <button type="submit" class="btn btn-primary">{{__('strings.search_btn')}}</button>
                </form>
            </div>
        </div> -->



    <div class="table-responsive mt-3">
        @if(count($platforms)>0)
            <table class="table table-striped align-items-center table-flush">
                <thead class="thead-light">
                    <th>{{__('strings.id_header')}}</th>
                    <th>{{__('strings.platform_name_header')}}</th>
                    <th>{{__('strings.actions_header')}}</th>
                </thead>
                <tbody>
                    @foreach($platforms as $platform)
                        <tr>
                            <td>
                                {{$platform->id}}
                            </td>
                            <td>
                                {{$platform->name}}
                            </td>
                            <td>
                                <div class="btn-group" role="group" style="width:100%">
                                    <a class="btn btn-success" href="{{ route('platforms.edit', $platform) }}">
                                        {{__('strings.edit_btn')}}                            
                                    </a>
                                    <form id="delete-form-{{$platform->id}} class="delete-btn"
                                        action="{{ route('platforms.delete', [$platform])}}"
                                        method="POST" style="display: index-block;">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" href="javascript:void(0);"
                                            onlick="event.preventDefault()
                                            document.getElementById('delete-form-{{$platform->id}}').submit()">
                                            {{__('strings.delete_btn')}}    
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @else
            <div class="alert alert-warning mt-3">
                {{__('strings.no_platforms')}}
            </div>
        @endif
    </div>
    <div class="row my-3 pr-3">
        <div class="col">
            <div class="float-right">
                @if($platforms instanceof \Illuminate\Pagination\LenghtAwarePAginator)
                    {{ $platforms->links() }}                    
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

