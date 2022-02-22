@extends('layouts.main')

@section('title')
    {{__('strings.home_title')}}
@endsection

@section('content')
<div class="row mb-5">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row">
                    <h1>{{__('strings.home_title')}}</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Plataformas</h5>
                                    <p class="card-text">Listado y gestión de plataformas creadas en BBDD.</p>
                                    <a class="btn btn-primary" href="{{route('platforms.index')}}">Listado de plataformas</a>
                                    </div>
                                </div>
                            </div>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Plataformas</h5>
                                    <p class="card-text">Listado y gestión de plataformas creadas en BBDD.</p>
                                    <a class="btn btn-primary" href="{{route('platforms.index')}}">Listado de plataformas</a>
                                    </div>
                                </div>
                            </div>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Plataformas</h5>
                                    <p class="card-text">Listado y gestión de plataformas creadas en BBDD.</p>
                                    <a class="btn btn-primary" href="{{route('platforms.index')}}">Listado de plataformas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
           <div>
                 <div class="card-body">
                    <form name="logout" action="{{route('logout')}}" method="POST">
                        @csrf
                        <input type="submit" 
                            value="{{__('strings.logout_btn')}}" class="btn btn-primary" name="logoutBtn"/>                        
                    </form>
                </div>
</div>                                                            
@endsection

