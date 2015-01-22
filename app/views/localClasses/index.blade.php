@extends('layouts.main')

@section('content')
    <h1>List the classes</h1>
    <ul class="list-group">
        @foreach($classes as $class)
            <li class="list-group-item">
                <a href="{{ route('show_class', $class->date) }}">
                    {{ date("F d, Y", strtotime($class->date)) }} at {{ $class->location->address }}
                </a>
            </li>
        @endforeach
    </ul>
@stop
