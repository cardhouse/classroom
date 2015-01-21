@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3 class="panel-title">Sign In</h3>
            </div>
            <div class="panel-body">
                {{ Form::open(['route' => 'login_path']) }}

                <div class="form-group">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Password:') }}
                    {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
                </div>

                <div class="form-group text-center">
                    {{ Form::submit('Sign In', ['class' => 'btn btn-block btn-primary']) }}
                    <hr>
                    {{ link_to_route('register_path', "Register for an account") }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop