@extends('layouts.main')

@section('content')

    <h1>Time to Enroll, {{ $currentUser->name }}</h1>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{ Form::open(['path' => 'enroll_path']) }}

            <!-- Number of Students Input Form -->
            <div class="form-group">
                {{ Form::label('num_students', 'Number of Students:') }}
                {{ Form::number('num_students', 1, ['class' => 'form-control']) }}
            </div>

            <!-- Promo dropdown -->
            <div class="form-group">
                {{ Form::label('promo_code', 'Promo code:') }}
                {{ Form::select('promo_code', $promo_codes->lists('promo_code', 'id'), null, ['class' => 'form-control']) }}
            </div>

            <!-- Form Submit Button -->
            <div class="form-group">
                {{ Form::submit('Enroll', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>

@stop
