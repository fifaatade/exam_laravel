@extends('User.layout.masteregistry')
@section('title','login')

@section('content')

    <div class="container">
        <form action="{{route('relogin')}}"  method="POST" autocomplete="off" enctype="multipart/form-data" style="width: 640px; margin:0 auto" class="form" >
            @csrf
    
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{old('email')}} " name="email" class="form-control" placeholder="veuillez entrer votre email" id="">
            </div>
            <button type="submit" class="btn btn-success float-end "> Envoyer</button>
            <div class="">
                <a href="{{route('login')}}" class="btn btn-danger">annuler</a>
            </div>
        </form>
    
    </div>    
@endsection
    
