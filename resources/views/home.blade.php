@extends('layouts._dashboard')

@section('body')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">State</h4>

                        <p class="category">Spread of repairshops in states</p>
                    </div>
                    <div class="content">
                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                        <div class="footer">
                            <hr>
                            <div class="stats" id="stateStats">
                                <i class="fa fa-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Zones</h4>

                        <p class="category">Zones with highest number of repairshops</p>
                    </div>
                    <div class="content">
                        <div id="chartActivity" class="ct-chart"></div>

                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-check"></i> Latest from database
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('custom_javascript')

    <script src="{{ asset('js/chartdata.js') }}"></script>

@endsection
