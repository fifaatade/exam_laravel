@extends('User.layout.masteregistry')
@section('title','new login')


@section('content')
    <form action="{{route('modifyPassWord')}}" method="POST" autocomplete="off" style="width: 640px; margin:0 auto" class="form">  
        @csrf
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="new_password" class="form-control" id="">
        </div>
        <div class="mb-3 mt-3">
            <label for="password_confirmation" class="form-label">Confirmation du mot de passe</label>
            <input type="password" name="new_password_confirmation" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success float-end "> Enregistrer</button>
    </form>
@endsection

