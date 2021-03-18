@extends('layouts.app')

@section('content')

    @manager
        <div class="text-center"> {{ $visits }} </div>
    @endmanager

@endsection
