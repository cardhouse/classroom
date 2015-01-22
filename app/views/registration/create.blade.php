@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1>Register Now</h1>
        
        @include('registration.partials.registration_form')
    </div>
</div>
@stop