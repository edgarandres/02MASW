<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @yield('cabeza')
    </head>
    <body>
        <div class="position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">{{__('strings.home')}}</a>
                        @else
                            <a href="{{ route('login') }}">{{__('strings.login')}}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">{{__('strings.register')}}</a>
                            @endif
                        @endauth
                    </div>
                @endif
            <div style="margin: 2%">
                    <h3><a href="{{route('index')}}">{{__('strings.index')}}</a></h3>
                <div class="row">
                    <div class=col-1></div>
                    <div class=col-10>
                        <!-- AQUI EMPIEZA CUERPO -->
                        @yield('contenido')
                        <!-- AQUI TERMINA CUERPO -->
                    </div>
                    <div class=col-1></div>
                </div>
            </div>
        </div>

    </body>
</html>
