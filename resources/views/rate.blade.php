@extends('layouts._dashboard')

@section('body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Specify Service</h4>
                    </div>
                    <div class="content">
                        <form id="appendform" method="POST" action="{{ url('/rate') }}">
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
                                <div class="col-md-6" id="repairshop">
                                    <div class="form-group{{ $errors->has('repairshop') ? ' has-error' : '' }}">
                                        <label>Repair Shop</label>
                                        <select class="form-control repairshop" name="repairshop">
                                            <option value="">Specify Repair Shop</option>
                                            @forelse($repairshops as $repairshop)
                                                <option value="{{ $repairshop->repairshop_id }}">{{ $repairshop->repairshop  }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                        @if ($errors->has('repairshop'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('repairshop') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

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