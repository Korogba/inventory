@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/cover.css') }}">
@endsection

@section('content')
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
@endsection

@section('foot')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
@endsection
