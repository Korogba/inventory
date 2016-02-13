<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dash Auto Store</title>

    <!--     Fonts and icons     -->
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    @yield('head')

</head>

<body>

    @yield('content')

    <!-- Core JS Files -->
    <script src="{{ asset('js/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('foot')
</body>
</html>
