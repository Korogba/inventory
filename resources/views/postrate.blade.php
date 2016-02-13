@extends('layouts._dashboard')

@section('body')

    <div class="container-fluid">
        <div class="row">
            @if(!$rates->isEmpty())
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Rate List For: {{ $subcomponent }}</h4>
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
                                @foreach($rates as $rate)
                                    <tr>
                                        <td>{{ $rate->repairshop->repairshop }}</td>
                                        <td>{{ $rate->repairshop->zone->zone }}</td>
                                        <td> &#8358; {{ number_format($rate->amount, 2) }}</td>
                                        <td>{{ $rate->carmodel->carmodel }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <a type="button" class="btn btn-info btn-fill pull-right" href="{{ url('/rate') }}" style="margin-right:10px;">
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
                                <p class="category">Go back and try with different search parameters</p>
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