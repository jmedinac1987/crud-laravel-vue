<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel & Vue</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    
        <!-- bootstrap 4.1 y toastr-->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        
        <!-- Mostrar la data en formato json y las tareas en una lista -->
        <div id="main" class="container">
            <h1 class="display-4">CRUD Laravel y Vue.js</h1>
            
            @yield('content')

        </div>


        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
