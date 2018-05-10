<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Tutme</title>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAceQpVKumhZ5YrNGsTELNpsfsnEdllqaE&libraries=places"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('assets/css/app.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

        <!-- Dashboard Core -->
        <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" />


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

        <script src="{{ mix('assets/js/app.js') }}"></script>


        <script src="{{ asset('assets/js/require.min.js') }}"></script>
        <script>
            requirejs.config({
                baseUrl: '.'
            });
        </script>
        <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    </body>
</html>
