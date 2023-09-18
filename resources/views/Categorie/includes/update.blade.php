@if($categorie)
    <div>
        <a class="btn btn-danger text-body-secondary mt-5 mb-5" href="{{route('categorie')}}">retour</a>
    </div>
    <form action="{{route('updateCategorie',$categorie['id'])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3" style="height: 60px">
            <span class="input-group-text" style="height: 100%">nom</span>
            <input type="text" class="form-control" id="floatingInputGroup1" name="new_nom" value="{{$categorie['name']}}" style="height: 100%">
        </div>
        <div class="button">
            <button type="submit" class="btn mt-3 btn-success float-end">modifier</button>
        </div>
    </form>
@endif
