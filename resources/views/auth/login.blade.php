@extends('layouts.app')

@section('head')

    <link href="{{ asset('css/gsdk-base.css') }}" rel="stylesheet"/>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

@endsection

@section('content')

    <div class="image-container set-full-height" style="background-image: url('{{ asset('img/wizard.jpg') }}')">

        <!--   Creative Tim Branding   -->
        <a href="/">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{ asset('img/new_logo.png') }}">
                </div>
                <div class="brand">
                    Auto Shop
                </div>
            </div>
        </a>

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">

                        <div class="card wizard-card ct-wizard-orange" id="wizardProfile">

                            <!--        You can switch "ct-wizard-orange"  with one of the next bright colors:
                                "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->

                            <div class="wizard-header">
                                <h3>
                                    <b>SIGN IN</b> TO AUTO STORE <br>
                                    <small>Get signing details from administrator</small>
                                </h3>
                            </div>
                            <ul>
                                <li><a href="#sign_in" data-toggle="tab">Sign In</a></li>
                                <li><a href="#forgot_password" data-toggle="tab">Forgot Password</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane" id="sign_in">
                                    <div class="row">
                                        <form method="POST" action="{{ url('/login') }}">
                                            {!! csrf_field() !!}
                                            <h4 class="info-text"> Enter your details </h4>

                                            <div class="col-sm-6 col-sm-offset-1">
                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label>Email Address
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="email" type="email" class="form-control"
                                                           value="{{ old('email') }}">

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label>Password
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="password" type="password" class="form-control">

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember"> Remember Me
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit"
                                                            class="btn btn-fill btn-warning btn-wd btn-sm">
                                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                                    </button>

                                                    <a class="btn btn-fill btn-warning btn-wd btn-sm pull-right"
                                                       href="{{ url('/password/reset')  }}">Forgot Your Password?</a>

                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- wizard container -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!--  big container -->

    </div>
@endsection

@section('foot')

    <!--   plugins 	 -->
    <script src="{{ asset('js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

    <!--  methods for manipulating the wizard and the validation -->
    <script src="{{ asset('js/wizard.js') }}"></script>

@endsection