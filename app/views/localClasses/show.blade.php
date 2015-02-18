@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-push-4">
            <div class="jumbotron">
                <h2>Same Course <small><i>only more fun...</i></small></h2>
                <p>This NYS DMV approved Point & Insurance Reduction Program is a six hour class designed to educate as well as to occupy and interest every participant. </p>
                <p>
                    Our tell-it-like-it-is presentation employs a provocative improvisational setting and highly skilled instructors who can deliver the message engagingly and humorously.
                </p>

            </div>
        </div>
        <div class="col-md-4 col-md-pull-8">
            <div class="list-group text-center">
                <div class="list-group-item">
                    <h2>{{ $localClass->date->toFormattedDateString() }}
                        <small pull-right>(9am - 3pm)</small>
                    </h2>
                    <p>{{ $localClass->date->diffForHumans() }}</p>
                </div>
                <div class="list-group-item">
                    <h2>
                        {{ $localClass->location->name }}
                        <small>
                            <address>{{ $localClass->location->address }}</address>
                        </small>
                    </h2>

                </div>
                <div class="list-group-item">
                    <h2>
                        ${{ $localClass->price }}
                        <small>per person</small>
                    </h2>
                </div>
                <div class="list-group-item">
                    {{ link_to_route(
                        'enroll_path', // Path Name
                        'Enroll Now', // Display Text
                        ['date' => $localClass->date->toDateString()], // Parameters
                        ['class' => 'btn btn-lg btn-primary btn-block']
                    )}}
                </div>
            </div> <!-- /container -->
        </div>
        <!-- Main jumbotron for a primary marketing message or call to action -->

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