<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Default') | Panel de Administración</title>
        <link rel="stylesheet" href="{{ asset('css/general.css')}}">
        <link rel="stylesheet" href="{{ asset('css/admin.css')}}">
        <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body class="admin-body">
        
        @include('admin.template.partials.nav')

        <section class="section-admin">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title title-page">@yield('title')</h3>
                </div>
                <div class="card-body">
                    @include('flash::message')
                    @include('admin.template.partials.errors')
                    @yield('content')
                </div>
            </div>      
        </section>

        @include('admin.template.partials.footer')

        <script src="{{ asset('lib/jquery/js/jquery-3.3.1.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('lib/bootstrap/js/bootstrap.js') }}"></script>
    </body>
</html>