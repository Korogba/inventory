@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="page-header">
            <h1>Get Price <small>Start by selecting location</small></h1>
        </div>

        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-success">
                    <div class="panel-heading">Price Form</div>

                    <div class="panel-body">

                        <form class="form-horizontal" id="appendform" role="form" method="POST" action="{{ url('/query') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}" id="state">
                                <label class="col-md-4 control-label">State</label>

                                <div class="col-md-6">
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

    <script>

        $(document).ready(function(){

            $('body').on('change','select.query', function(event){
                // Prevent default behaviour
                event.preventDefault();
                // Get some values from elements on the page:
                var url = '/query';
                var type = $(this).attr('name');
                var value = $(this).val();

                $.ajax({
                    type: 'post',
                    url: url,
                    data: {name: type, select: value},
                    success: function(data){
                        var name = data.result.name;

                        if ($("#" + name).length) {
                            $("#" + name).remove();
                        }

                        var uppercase_value = name.toLowerCase().replace(/\b[a-z]/g, function (letter) {
                            return letter.toUpperCase();
                        });
                        $('#insertbefore').before('<div class="form-group" id="' +
                        name + '">  <label class="col-md-4 control-label">' +
                        uppercase_value + '</label><div class="col-md-6"> <select class="form-control query" name="' + name
                        + '"> </select> </div></div>');

                        $.each(data.result.value, function(key, value){
                            $('select[name = '+ name +']').append($('<option></option>')
                                     .attr('value',value.id)
                                     .text(value.name));
                        });
                    }
                });
            });
        });
    </script>

@endsection