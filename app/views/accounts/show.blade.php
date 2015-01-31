@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="text-center">Classes you are enrolled in:</h1>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Class Date</th>
                        <th>Class Location</th>
                        <th># Students Registered</th>
                        <th>Promo Code</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->localClass->date }}</td>
                        <td>
                            <p>{{ $enrollment->localClass->location->name }}</p>
                            <p>{{ $enrollment->localClass->location->address }}</p>
                        </td>
                        <td>{{ $enrollment->num_students }}</td>
                        <td>{{ $enrollment->promo->promo_code or 'No promo code entered.' }}</td>
                        <td>${{ $enrollment->total }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop