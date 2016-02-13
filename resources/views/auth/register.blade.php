@extends('layouts._dashboard')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Register User</h4>
                    </div>
                    <div class="content">
                        <form method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>E-Mail Address</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <input type="hidden" class="form-control" name="password" value="password">
                                    <input type="hidden" class="form-control" name="password_confirmation" value="password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-fill">
                                            <i class="fa fa-btn fa-user"></i>Register
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
