<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dash Auto Store</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/cover.css') }}">

    <style>
        body {
        font-family: 'Lato';
        }

        .fa-btn {
        margin-right: 6px;
        }
    </style>

<body id="app-layout">

    <div class="site-wrapper">

        <div class="site-wrapper-inner">

            <div class="cover-container">

                <div class="masthead clearfix">
                    <div class="inner">
                        <h3 class="masthead-brand">Dash Auto Store</h3>
                        <nav>
                            <ul class="nav masthead-nav">
                                <li><a href="{{ url('/password/reset') }}">Forgot Password?</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="inner cover">
                    <h1 class="cover-heading">Our Services</h1>
                    <p class="lead"> Search database to get various services on offer, the prices of such services dependent on company. Easily
                    upload and update company profiles using csv imports and generate dynamic analytics such as price range, average, minimum and maximum
                    of services available for particular locations. </p>
                    <p class="lead">
                        <a href="{{ url('/login') }}" class="btn btn-lg btn-success">Sign in</a>
                    </p>
                </div>

                <div class="mastfoot">
                    <div class="inner">
                        <p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, App built by <a href="https://twitter.com/kaba_y">Kaba Yusuf</a>.</p>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('js/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
</body>
</html>