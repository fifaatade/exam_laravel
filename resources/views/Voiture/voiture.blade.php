@extends('layout.master')
@section('title','gestion de voiture')

@section('content')

    <div class="container">
        <h1 class="text-center text-danger mt-5 mb-5 float-end">GesCar Co..!</h1>
        @include('Voiture.includes.voitures')
    </div>    
@endsection
    
