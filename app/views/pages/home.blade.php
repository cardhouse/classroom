@extends('layouts.main')

@section('content')
<<<<<<< Updated upstream
    <div class="jumbotron">
        <h1>Welcome to NYSTS!</h1>
        <p>Home of the only humerous Point and Insurance Reduction Course</p>
        @if( ! $currentUser)
            <p>{{ link_to_route('register_path', 'Register Now', null, ["class" => "btn btn-lg btn-primary"]) }}</p>
        @endif
    </div>
=======

    {{--<div class="container-fluid">--}}
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-8">
                    <h1>Same class <small>just more fun...</small></h1>

                    {{ HTML::image('images/newYorkSeal.png', 'DMV approved', array('class' => 'pull-right')) }}

                    <p>
                        Home of the only humerous Point and Insurance Reduction Course approved by the New York State
                        Department of Motor Vehicles
                    </p>
                    <div class="clearfix"></div>
                    <h2>By taking this class, you will receive</h2>
                    <p>
                        <span class="glyphicon glyphicon-share-alt"></span>
                        10&#37; reduction of your collision and liability insurance for a full 3 years.
                    </p>
                    <p>
                        <span class="glyphicon glyphicon-share-alt"></span>
                        Up to 4 points reduced from your driving record (if you have any)
                    </p>
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--@{{ HTML::image('images/improv-logo-wall-transparent.png', 'improv comedy group') }}--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}

                        {{--</div>--}}
                    {{--</div>--}}
                </div>

                <div class="col-md-4">
                    <h2 class="text-center">Upcoming classes</h2>
                    @include('layouts.partials.class_list')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
            </div>

            <div class="col-sm-4">
            </div>
            <div class="col-sm-4 text-center">
                <small>Point reduction is valid on any points incurred in the last 18 months</small>
            </div>
        </div>
    {{--</div>--}}

>>>>>>> Stashed changes
@stop