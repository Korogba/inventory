@extends('layouts._dashboard')

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Upload Rates</h4>
                    </div>
                    <div class="content">

                        <div class="alert alert-info alert-with-icon alert-dismissible" data-notify="container">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
                            <span data-notify="icon" class="pe-7s-bell"></span>
                            <span data-notify="message">
                                Kindly note that you need a microsoft excel document to upload to server. The following instructions must be
                                followed exactly to enable successful upload. The name of the excel sheet to be uploaded must be "rates".
                                Note that this is different from the name of the document which is irrelevant. The excel sheet will have precisely
                                six (6) columns with headings exactly as shown: Repairshop Component Subcomponent Rate Carmake Carmodel. Only the repairshop
                                column requires only values that are already saved in the database.
                            </span>
                        </div>

                        <form method="POST" action="{{ url('/upload') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <div class="row">
                                <div class="col-md-6 col-md-offset-1">
                                    <div class="form-group{{ $errors->has('excel') ? ' has-error' : '' }}">
                                        <label>Upload File</label>
                                        <input type="file" name="excel" accept=".csv, text/rtf, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                        @if ($errors->has('excel'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('excel') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pull-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-fill">
                                            <i class="fa fa-btn fa-sign-in"></i>Submit
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            @include('flash::message')
                        </div>
                    </div>
                    @if (count($errors) > 0)
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection