<div>
    <a class="btn btn-outline-danger text-body-secondary mt-5 mb-3" href="{{route('voiture')}}">retour</a>
</div>
<form action="{{route('storeVoiture')}}" method="POST" enctype="multipart/form-data" class="me-5 mt-5">
    @csrf
    <div class="">
      <label for="nom" class="form-label">nom de la voiture</label>
      <input type="text" class="form-control" value="{{old('nom_voiture')}}" name="nom_voiture" id="inputEmail4">
    </div>
    <div class="">
      <label for="vitesse" class="form-label">boite à vitesse</label>
      <input type="text" name="boite_vitesse" value="{{old('boite_vitesse')}}" class="form-control" >
    </div>
    <div class="">
        <label for="nom" class="form-label">puissance</label>
        <input type="number" class="form-control" value="{{old('puissance')}}" name="puissance" id="inputEmail4">
    </div>
    <div class="">
        <label for="nbre_porte" class="form-label">nombre de porte</label>
        <input type="number" name="nbre_porte" value="{{old('nbre_porte')}}" class="form-control" >
    </div>
    <div class="">
        <label for="carburant" class="form-label">carburant</label>
        <input type="text" class="form-control" value="{{old('carburant')}}" name="carburant" id="inputEmail4">
    </div>
    <div class="">
        <label for="nbre_cylindre" class="form-label">nombre de cylindre</label>
        <input type="number" name="nbre_cylindre" value="{{old('nbre_cylindre')}}" class="form-control" >
    </div>
    <div class="">
        <label for="soupape" class="form-label">soupape</label>
        <input type="number" name="soupape" value="{{old('soupape')}}" class="form-control" >
    </div>
    <div class="">
        <label for="vitesse_max" class="form-label">vitesse maximale</label>
        <input type="number" name="vitesse_max" value="{{old('vitesse_max')}}" class="form-control" >
    </div>
    <div class="">
        <label for="acceleration" class="form-label">acceleration</label>
        <input type="number" name="acceleration" value="{{old('acceleration')}}" class="form-control" >
    </div>
    <div class="">
        <label for="frein" class="form-label">frein</label>
        <input type="text" name="frein" value="{{old('frein')}}" class="form-control" >
    </div>
    <div class=" mb-3">
        <label for="couleur" class="form-label">couleur</label>
        <input type="text" name="couleur" value="{{old('couleur')}}"  class="form-control" >
    </div>
    <div class=" mb-3">
        <input type="file" name="image_principale" class="form-control" >
    </div>
    <div class=" mb-3">
        <input type="file" name="image_2" class="form-control" >
    </div>
    <div class=" mb-3">
        <input type="file" name="image_3" class="form-control" >
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
    <select class="form-select mb-3" aria-label="Default select example" name="id_categorie" style="width: 100%">
        <option selected>Choisir une catégorie</option>
        @foreach($categorie as $item)
            <option value="{{$item['id']}}">{{$item['name']}}</option>
        @endforeach
    </select>
    <select class="form-select mb-3" aria-label="Default select example" name="id_modele" style="width: 100%">
        <option selected>année</option>
        @foreach($modele as $item)
            <option value="{{$item['id']}}">{{$item['annee']}}</option>
        @endforeach
    </select>     
    <div>
      <button type="submit" class="btn btn-success float-end mt-3 mb-5">enrégistrer</button>
    </div>
</form>
