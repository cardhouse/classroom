@include('layouts.partials.errors')

{{ Form::open(['route' => 'register_path']) }}
<div class="form-group">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email', null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
</div>
<div class="form-group">
    {{ Form::label('password', 'Password:') }}
    {{ Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off']) }}
</div>
<div class="form-group">
    {{ Form::label('password_confirmation', 'Confirm Password:') }}
    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::submit('Sign Up', ['class' => 'btn btn-primary']) }}
</div>
{{ Form::close() }}