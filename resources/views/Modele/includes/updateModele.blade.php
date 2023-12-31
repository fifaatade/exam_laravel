@if($modele)
    <div>
        <a class="btn btn-danger text-body-secondary mt-5 mb-5" href="{{route('marque')}}">retour</a>
    </div>
    <form action="{{route('updateModele',$modele['id'])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3" style="height: 60px">
            <span class="input-group-text" style="height: 100%">nom</span>
            <div class="form-floating" style="height: 100%">
                <input type="text" class="form-control" id="floatingInputGroup1" name="new_nom" value="{{$modele['modele_name']}}" style="height: 100%">
                <label for="floatingInputGroup1" style="height: 100%">nom</label>
            </div>
        </div>
        <div class="input-group mb-3" style="height: 60px">
            <span class="input-group-text" style="height: 100%">année</span>
            <div class="form-floating" style="height: 100%">
                <input type="text" class="form-control" id="floatingInputGroup1" name="new_year" value="{{$modele['annee']}}" style="height: 100%">
                <label for="floatingInputGroup1" style="height: 100%">année</label>
            </div>
        </div>
        <select class="form-select mb-3" aria-label="Default select example" name="new_marque" style="width: 100%">
            @foreach($marque as $item)
                <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
            @endforeach
        </select>
        <div class="button">
            <button type="submit" class="btn mt-3 btn-success float-end">modifier</button>
        </div>
    </form>
@endif
