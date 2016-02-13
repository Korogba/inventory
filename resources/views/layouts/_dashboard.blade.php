@extends('layouts.app')

@section('head')

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


@endsection

@section('content')

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{ asset('img/sidebar-5.jpg') }}">

            <!--

                Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                Tip 2: you can also add an image using data-image tag

            -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Dash Auto Store
                    </a>
                </div>

                <ul class="nav">
                    <li class="{{ set_active('home') }}">
                        <a href="{{ url('/home') }}">
                            <i class="pe-7s-home"></i>

                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="{{ set_active('rate') }}">
                        <a href="{{ url('/rate') }}">
                            <i class="pe-7s-server"></i>

                            <p>Get Rates</p>
                        </a>
                    </li>
                    <li class="{{ set_active('analysis') }}">
                        <a href="{{ url('/analysis') }}">
                            <i class="pe-7s-graph"></i>

                            <p>Analysis</p>
                        </a>
                    </li>
                    <li class="{{ set_active('upload') }}">
                        <a href="{{ url('/upload') }}">
                            <i class="pe-7s-upload"></i>

                            <p>Upload to Database</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ url('/home') }}">Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="{{ set_active('register') }}">
                                <a href="{{ url('/register') }}">
                                    Register New User
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/profile') }}">Change Password</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="content">
                @yield('body')
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>

        </div>
    </div>

@endsection

@section('foot')

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ asset('js/bootstrap-checkbox-radio-switch.js') }}"></script>

    <!--  Charts Plugin -->
    <script src="{{ asset('js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{ asset('js/light-bootstrap-dashboard.js') }}"></script>

    @yield('custom_javascript')

@endsection

