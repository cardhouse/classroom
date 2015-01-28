@extends('layouts.main')

@section('content')
    <ul>
        @forelse($promos as $promo)
            <li>{{ $promo->promo_code }}: ${{ $promo->discount }} from {{ $promo->name }}</li>
        @empty
            <h2>There are currently no promos</h2>
        @endforelse
    </ul>
@stop
