@extends('User.layout.masteregistry')
@section('title','register')

@section('content')

    <div class="container">
        <form action="{{route('storeUser')}}" method="post" enctype="multipart/form-data" style="width: 640px; margin:0 auto" class="form">
            @csrf
            <div class="mb-3 ">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="veuillez entrer votre nom" id="">
            </div>
            <div class="mb-3 mt-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" placeholder="veuillez entrer votre prénom" id="">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="fifa@gmail.com" id="">
            </div>
            <div class="mb-3 mt-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="">
            </div>
            <div class="mb-3 mt-3">
                <label for="password" class="form-label">Confirmation du mot de passe</label>
                <input type="password" name="password_confirmation" class="form-control" id="">
            </div>
            <button type="submit" class="btn btn-success float-end "> S'inscrire</button>
            <div class="">
                <p class="mt-3 mt-3"><b>Vous avez déjà un compte? </b><a href="{{route('login')}}">cliquez ici</a></p>
            </div>
        </form>
    
    </div>    
@endsection
    
