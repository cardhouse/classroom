@extends('layouts.main')

@section('content')
    <ul>
        @foreach($locations as $location)
            <li>{{ $location->name }}: {{ $location->address }}</li>
        @endforeach
    </ul>

    @if( $currentUser )
        {{ link_to_route('add_locations_path', 'Add a location', null, ['class' => 'btn btn-success']) }}
    @endif
@stop