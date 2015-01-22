@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Add a class</h1>

            {{ Form::open(['route' => 'add_local_class_path']) }}

            {{ Form::label('date', 'Date:') }}
            <div class="input-group input-append date">
                <span class="input-group-btn" id="calendar">
                    <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-calendar"></i></button>
                </span>
                <input name="date" type="text" class="form-control" placeholder="Choose a date...">
            </div><!-- /input-group -->

            <br />

            <!-- Location Input Form -->
            {{ Form::label('location', 'Location:') }}
            <div class="input-group">
                <span class="input-group-btn" id="add">
                    <a href="{{route('add_location_path')}}" class="btn btn-default" type="button"><i class="glyphicon glyphicon-plus"></i></a>
                </span>
                {{ Form::select('location_id', $locations, null, ['class' => 'form-control']) }}
            </div>

            <br />

            <!-- Form Submit Button -->
            <div class="form-group">
                {{ Form::submit('Add Class', ['class' => 'btn btn-primary']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>

@stop