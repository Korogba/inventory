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
                                    <b>PASSWORD </b> RESET <br>
                                    <small>Enter email to get a reset link</small>
                                </h3>
                            </div>

                            <div class="row">
                                <form class="form-horizontal" method="POST" action="{{ url('/password/email') }}">
                                    {!! csrf_field() !!}

                                    <div class="col-sm-8 col-sm-offset-1">

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input type="email" class="form-control" name="email"
                                                       value="{{ old('email') }}">

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill btn-warning center-block">
                                                <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                            </button>
                                        </div>

                                    </div>
                                </form>
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