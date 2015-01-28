@extends('layouts.main')

@section('content')
<h1> {{ $registrations->count() }} registrations for the class on {{ $localClass->date }}</h1>

{{ $total_students }}

<ul>
    @foreach($registrations as $registration)
        <li>{{ $registration->user->name }} has {{ $registration->num_students }} students</li>
    @endforeach
</ul>

@stop
