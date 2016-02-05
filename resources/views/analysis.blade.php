@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="page-header">
            <h1>Analysis <small>Specify parameters</small></h1>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-success">
                    <div class="panel-heading">Parameters</div>

                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/analysis') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Service</label>

                                <div class="col-md-6">
                                    {!! Form::select('service', $service, null, ['id'=>'service', 'class'=>'form-control']) !!}
                                    @if ($errors->has('service'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('service') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" id="next" class="btn btn-primary">
                                        <i class="fa fa-btn fa-calculator"></i>Submit
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