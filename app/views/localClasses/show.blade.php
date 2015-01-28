@extends('layouts.main')

@section('content')
    <div class="row">
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1>Point and Insurance<br />
                    Reduction Course!</h1>
                <p>The only humorous PIR class allowed by the New York State Department of Motor Vehicles</p>

                {{ link_to_route(
                    'enroll_path', // Path Name
                    'Enroll Now', // Display Text
                    ['date' => $date->toDateString()], // Parameters
                    ['class' => 'btn btn-lg btn-primary']
                )}}
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                    <h2>Class Date</h2>
                    <p>{{ $date->toFormattedDateString() }}</p>
                    <p>{{ $date->diffForHumans() }}</p>
                </div>
                <div class="col-md-4">
                    <h2>Location</h2>
                    <p>{{ $localClass->location->address }}</p>
                </div>
                <div class="col-md-4">
                    <h2>Cost</h2>
                    <p>Registration costs ${{ $localClass->price }}</p>
                </div>
            </div>
        </div> <!-- /container -->
    </div>

    <!-- Registration Modal -->
    <div class="modal fade" id="registration_form" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="registrationModalLabel">Register Now!</h4>
                </div>
                <div class="modal-body">
                    @include('registration.partials.registration_form')
                </div>
            </div>
        </div>
    </div>
@stop