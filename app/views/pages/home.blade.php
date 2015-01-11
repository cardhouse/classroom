@extends('layouts.main')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to NYSTS!</h1>
        <p>Home of the only humerous Point and Insurance Reduction Course</p>
        @if( ! $currentUser)
            <p>{{ link_to_route('register_path', 'Register Now', null, ["class" => "btn btn-lg btn-primary"]) }}</p>
        @endif
    </div>
@stop