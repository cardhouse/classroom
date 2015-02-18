@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1>DriveNY.org</h1>
            <p>Home of the only humerous Point and Insurance Reduction Course</p>
            @if( ! $currentUser)
                <p>{{ link_to_route('register_path', 'Register Now', null, ["class" => "btn btn-lg btn-primary"]) }}</p>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-4 text-center">
                <h2>Benefits</h2>
                <h3>Insurance reduction</h3>
                <p>Each student will receive 10&#37; off of their collision and liability insurance for a full three
                    years.</p>
                <h3>Point reduction</h3>
                <p>Each student can have up to 4 points reduced from their driving record</p>

            </div>
            <div class="col-sm-4">
                @include('layouts.partials.class_list')
            </div>
            <div class="col-sm-4 text-center">
                <small>Point reduction is valid on any points incurred in the last 18 months</small>
            </div>
        </div>
    </div>

@stop