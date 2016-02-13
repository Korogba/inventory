@extends('layouts._dashboard')

@section('body')

    <div class="container-fluid">
        <div class="row">
            @if($report['results'])
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Analysis For: {{ $report['subcomponent']->subcomponent }}</h4>

                            <p class="category">Search constrained to: {{ $report['region'] }}
                                - {{ $report['regionModel']->$report['region']}} </p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                <th>Repair Shop</th>
                                <th>Zone</th>
                                <th>Rate</th>
                                <th>Car Model</th>
                                </thead>
                                <tbody>
                                @foreach($report['rates'] as $rate)
                                    <tr>
                                        <td>{{ $rate->repairshop->repairshop }}</td>
                                        <td>{{ $rate->repairshop->zone->zone }}</td>
                                        <td> &#8358; {{ number_format($rate->amount, 2) }}</td>
                                        <td>{{ $rate->carmodel->carmodel }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                        <div class="content">
                            <div class="typo-line">
                                <h4>Analytics</h4>

                                <p>
                                    Average Price:  &#8358; <span class="text-primary">{{ number_format($report['analytics']['avg'], 2) }}</span><br>
                                    Maximum Price:  &#8358; <span class="text-warning">{{ number_format($report['analytics']['max']->amount, 2) }}</span> offered
                                    by {{ $report['analytics']['max']->repairshop->repairshop }}<br>
                                    Minimum Price:  &#8358; <span class="text-success">{{ number_format($report['analytics']['min']->amount, 2) }}</span> offered
                                    by {{ $report['analytics']['min']->repairshop->repairshop }}<br>
                                    Range:  &#8358; <span class="text-info">{{ number_format($report['analytics']['max']->amount - $report['analytics']['min']->amount, 2) }}</span>
                                </p>
                            </div>

                            <a type="button" class="btn btn-info btn-fill pull-right" href="{{ url('/analysis') }}"
                               style="margin-right:10px;">
                                <i class="pe-7s-back"></i>
                                Back
                            </a>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-warning">Sorry, zero results returned</h4>

                                <p class="category">You tried searching for {{ $report['subcomponent']->subcomponent }}
                                    in the {{ $report['region'] }}: {{ $report['regionModel']->$report['region']}}
                                </p>
                            </div>
                            <div class="content">
                                <a type="button" class="btn btn-info btn-fill pull-right" href="{{ url('/rate') }}">
                                    <i class="pe-7s-back"></i>
                                    Back
                                </a>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection