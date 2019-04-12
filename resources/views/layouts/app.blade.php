<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <!-- Styles -->
        <style>
            
            html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
}

.full-height {
    height: 100vh;
}

.flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
}

.position-ref {
    position: relative;
}

.top-right {
    position: absolute;
    right: 10px;
    top: 18px;
}

.content {
    text-align: center;
}

.title {
    font-size: 84px;
}

.links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}

.m-b-md {
    margin-bottom: 30px;
}

#doc {
    margin-left: 10px;
}

.btn {
    padding: 10px 10px;
    border: 1px solid black;
    background-color: orange;
    color: white;
}

.succes {
    height: 30px;
    width: 500px;
    background-color: green;
}

.error {
    height: 30px;
    width: 500px;
    background-color: red;
}
#error {
    color: white;
}

#doc {
    font-size: 15px;
}
        
        </style>
    </head>
    <body>
        <main>
            <div class="flex-center position-ref full-height">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </main>
        <!-- Scripts -->
        <script src="{{ asset('js/main.min.js') }}"></script>
    </body>
</html>
