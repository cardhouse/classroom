@extends('layouts.main')

@section('content')
    <h1>List the classes</h1>
    <ul class="list-group">
        @foreach($classes as $class)
            <li class="list-group-item">{{ $class->date }} at {{ $class->location->address }}</li>
        @endforeach
    </ul>
@stop
