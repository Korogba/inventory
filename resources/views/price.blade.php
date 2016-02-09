@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="page-header">
            <h1>Get Price <small>Start by selecting location </small> <i class="fa fa-spinner fa-pulse hidden" id="loading_ajax"></i></h1>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-success">
                    <div class="panel-heading">Price Form</div>

                    <div class="panel-body">

                        <form class="form-horizontal col-md-10 pull-left" id="appendform" role="form" method="POST" action="{{ url('/query') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}" id="state">
                                <label class="col-md-4 control-label">State</label>

                                <div class="col-md-6" err_display="err_display">
                                    {!! Form::select('state', $state, null, ['class'=>'form-control query']) !!}
                                    @if ($errors->has('location'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group" id="insertbefore">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" id="submitnext" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Next
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('foot')

    <script src="{{ asset('js/ajaxload.js') }}"> </script>

@endsection