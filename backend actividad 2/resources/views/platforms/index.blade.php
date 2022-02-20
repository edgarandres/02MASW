@extends('layouts.main')

@section('title')
    {{__('strings.platform_index_title')}}')
@endsection

@section('content')

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

</div>

<div class="table-responsive mt-3">
    @if(count($platforms)>0)
        <table class="table table-striped align-items-center table-flush">
            <thead class="thead-light">
                <th>{{__('strings.id_header')}}</th>
                <th>{{__('strings.name_header')}}</th>
                <th>{{__('strings.actions_header')}}</th>
            </thead>
            <tbody>
                @foreach($paltforms as $platform)
                    <tr>
                        <td>
                            {{platform->id}}
                        </td>
                        <td>
                            {{platform->name}}
                        </td>
                        <td>
                            <a href="{{route('platfoms.edit', $platform)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <form id="delete-form-{{$platform->id}}"
                                action="{{route('platforms.delete', [$platform])}}"
                                method="POST" style="display: index-block;">
                                {{method_field('delete')}}
                                {{cerf_field()}}
                                <a href="javascript:void(0);"
                                    onlick="event.preventDefault()
                                    document.getElementById('delete-form-{{$platform->id}}').submit()">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </form>
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
                {{$platforms->links()}}                    
            @endif
        </div>
    </div>
</div>

@endsection

