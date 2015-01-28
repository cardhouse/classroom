@extends('layouts.main')

@section('content')

    @include('layouts.partials.errors')

{{ Form::open(['route' => 'add_promo_path']) }}
    
    <!-- Name Input Form -->
    <div class="form-group">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <!-- Promo Code Input Form -->
    <div class="form-group">
        {{ Form::label('promo_code', 'Promo Code:') }}
        {{ Form::text('promo_code', null, ['class' => 'form-control']) }}
    </div>

    <!-- Discount Amount Input Form -->
    <div class="form-group">
        {{ Form::label('discount', 'Discount Amount:') }}
        {{ Form::text('discount', null, ['class' => 'form-control']) }}
    </div>

    <!-- Form Submit Button -->
    <div class="form-group">
        {{ Form::submit('Add Promo Code', ['class' => 'btn btn-primary']) }}
    </div>

{{ Form::close() }}

@stop
