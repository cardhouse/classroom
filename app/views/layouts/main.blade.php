
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/main.css">
        {{ HTML::style('/css/datepicker.css') }}
        {{ HTML::script('/javascript/bootstrap-datepicker.js') }}
        <style>
            body {
                margin-top: 70px;
            }
        </style>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        @include('layouts.partials.nav')
        
        <div class="container">
            @include('flash::message')
            
            @yield('content')
        </div>
        
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        {{ HTML::script('/javascript/bootstrap-datepicker.js') }}
        <script>$('#flash-overlay-modal').modal();</script>
        <script>
            $('.input-append.date').datepicker({
                format: "MM dd, yyyy",
                autoclose: true,
                todayHighlight: true
            });
        </script>
    </body>
</html>