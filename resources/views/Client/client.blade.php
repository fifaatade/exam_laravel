@extends('layout.master')
@section('title','client')

@section('content')

    <div class="container">
        <h1 class="text-center text-danger mt-5 mb-5 float-end">GesCar Co..!</h1>
        @include('Client.includes.clients')
    </div>    
@endsection
    
