<div>
    <a class="btn btn-danger text-body-secondary mt-5 mb-3" href="{{route('location')}}">retour</a>
</div>
<form action="{{route('storeLocation')}}" method="POST" enctype="multipart/form-data" class="me-5 mt-5">
    @csrf
    <div class=" mb-3">
        <label for="nbre_cylindre" class="form-label">date de sortie</label>
        <input type="date" name="date_sortie_voiture" class="form-control" value="{{old('date_sortie_voiture')}}">
    </div>
    <div class=" mb-3">
        <label for="nbre_cylindre" class="form-label">date prévue de retour</label>
        <input type="date" name="date_prevue_retour" class="form-control" value="{{old('date_prevue_retour')}}">
    </div>
    <select class="form-select mb-3" aria-label="Default select example" name="modele_id" style="width: 100%">
        <option selected>Choisir un modèle</option>
        @foreach($modele as $item)
            <option value="{{$item['id']}}">{{$item['modele_name']}}</option>
        @endforeach
    </select>
    <select class="form-select mb-3" aria-label="Default select example" name="id_marque" style="width: 100%">
        <option selected>Choisir une marque</option>
        @foreach($marque as $item)
            <option value="{{$item['id']}}">{{$item['name']}}</option>
        @endforeach
    </select>
    <select class="form-select mb-3" aria-label="Default select example" name="id_client" style="width: 100%">
        <option selected>Choisir un client</option>
        @foreach($client as $item)
            <option value="{{$item['id']}}">{{$item['nom']}} {{$item['prenom']}}</option>
        @endforeach
    </select>
    <select class="form-select mb-3" aria-label="Default select example" name="id_modele" style="width: 100%">
        <option selected>année</option>
        @foreach($modele as $item)
            <option value="{{$item['id']}}">{{$item['annee']}}</option>
        @endforeach
    </select>     
    <select class="form-select mb-3" aria-label="Default select example" name="id_voiture" style="width: 100%">
        <option selected>voiture</option>
        @foreach($voiture as $item)
            <option value="{{$item['id']}}">{{$item['nom_voiture']}}</option>
        @endforeach
    </select>
    <div>
      <button type="submit" class="btn btn-success float-end mt-3 mb-5">enrégistrer</button>
    </div>
</form>
