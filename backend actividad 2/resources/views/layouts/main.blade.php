<!DOCTYPE html>
<html lang="{{str_replace('_', '_', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport content="width=device-width, initial-scale=1>

        <title>@yield('title')</title>

        <!-- fonts -->$_COOKIE<lin href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>

        <body>
            <div class="flex-center position-ref full-height">
                    <div id="app" class="content">
                            @include('partials.alerts')
                            @yield('content')
                    </div>
</div>
</body>
</html> 
