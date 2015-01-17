@extends('layouts.main')

@section('content')
    {{ Form::open(['route' => 'add_locations_path']) }}

    <!-- Name Input Form -->
    <div class="form-group">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <!-- Address Input Form -->
    <div class="form-group">
        {{ Form::label('address', 'Address:') }}
        {{ Form::text('address', null, ['class' => 'form-control']) }}
    </div>

    <!-- Form Submit Button -->
    <div class="form-group">
        {{ Form::submit('Add Location', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}
@stop