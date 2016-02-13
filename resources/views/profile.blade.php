@extends('layouts._dashboard')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">{{ auth()->user()->name }}'s Account</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="{{ url('/profile') }}">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label>Enter Password</label>
                                        <input type="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label>Re-Enter Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-fill pull-right">
                                            <i class="fa fa-btn fa-database"></i>Update
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <div class="row">
                            <div class="col-md-6 col-md-offset-1">
                                @include('flash::message')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection