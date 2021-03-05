@extends('layouts.app')


@section('content')

    @foreach($shops as $shop)

    	<p class="text-center"> {{ $shop->nom }} </p>

    @endforeach

@endsection
