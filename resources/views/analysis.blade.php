@extends('layouts._dashboard')

@section('body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Specify Query Parameters</h4> <i class="icon-spinner icon-spin icon-large hidden" id="loading_ajax"></i>
                    </div>
                    <div class="content">
                        <form id="appendform" method="POST" action="{{ url('/analysis') }}">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6" id="component">
                                    <div class="form-group{{ $errors->has('component') ? ' has-error' : '' }}">
                                        <label>Component</label>
                                        <select class="form-control component" name="component">
                                            <option value="">Specify Component</option>
                                            @foreach($components as $component)
                                                <option value="{{ $component->component_id }}">{{ $component->component  }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('component'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('component') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <span id="insertSubComponent">
                                </span>

                            </div>

                            <div class="row">

                                <div class="col-md-4" id="state">
                                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                        <label>State</label>
                                        <select class="form-control query" name="state">
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                                <option value="{{ $state->state_id }}">{{ $state->state  }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('state'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <span id="insertbefore">
                                </span>

                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Submit Query</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('custom_javascript')

    <script src="{{ asset('js/ajaxload.js') }}"></script>

@endsection