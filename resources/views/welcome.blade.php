<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

        <script src="{{ asset('assets/js/require.min.js') }}"></script>
        <script>
            requirejs.config({
                baseUrl: '.'
            });
        </script>

        <script src="{{ asset('assets/js/dashboard.js') }}"></script>

        <!-- Dashboard Core -->
        <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" />
        <!-- c3.js Charts Plugin -->
        <link href="{{ asset('assets/plugins/charts-c3/plugin.css') }}" rel="stylesheet" />

        <link href="{{ asset('assets/plugins/maps-google/plugin.css') }}" rel="stylesheet" />

    </head>
    <body>
        <div id="app">
            <App></App>
        </div>




        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>



        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/popper.min.js"></script>--}}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


        <script src="{{ asset('assets/plugins/charts-c3/plugin.js') }}"></script>
        <!-- Google Maps Plugin -->
        <script src="{{ asset('assets/plugins/maps-google/plugin.js') }}"></script>
        <!-- Input Mask Plugin -->
        <script src="{{ asset('assets/plugins/input-mask/plugin.js') }}"></script>
    </body>
</html>
