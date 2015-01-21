@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3 class="panel-title">Add a Location</h3>
            </div>
            <div class="panel-body">
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
                    {{ Form::submit('Add Location', ['class' => 'btn btn-block btn-primary']) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop