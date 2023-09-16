<div>
    <a class="btn btn-outline-danger text-body-secondary mt-5 mb-3" href="{{route('home')}}">retour</a>
</div>
<form action="{{route('clientStore')}}" method="POST" enctype="multipart/form-data" style="width: 50%; margin:0 auto">
    @csrf
    <div class="input-group mb-3" style="height: 60px">
        <span class="input-group-text" style="height: 100%">nom</span>
        <div class="form-floating" style="height: 100%">
            <input type="text" class="form-control" id="floatingInputGroup1" value="{{old('nom')}}" name="nom"   placeholder="nom" style="height: 100%">
            <label for="floatingInputGroup1" class="label" style="height: 100%">Nom du client</label>
        </div>
    </div>
    <div class="input-group mb-3" style="height: 60px">
        <span class="input-group-text" style="height: 100%">prénom</span>
        <div class="form-floating" style="height: 100%">
            <input type="text" class="form-control" id="floatingInputGroup1" value="{{old('prenom')}}" name="prenom"   placeholder="prenom" style="height: 100%">
            <label for="floatingInputGroup1" class="label" style="height: 100%">prenom</label>
        </div>
    </div>
    <div class="input-group mb-3" style="height: 60px">
        <span class="input-group-text" style="height: 100%">tel</span>
        <div class="form-floating" style="height: 100%">
            <input type="tel" class="form-control" id="floatingInputGroup1" value="{{old('tel')}}" name="tel"   placeholder="+229 99001245" style="height: 100%">
            <label for="floatingInputGroup1" style="height: 100%" class="label">+229 99001245</label>
        </div>
    </div>
    <div class="input-group mb-3" style="height: 60px">
        <span class="input-group-text" style="height: 100%">adresse</span>
        <div class="form-floating" style="height: 100%">
            <input type="text" class="form-control" id="floatingInputGroup1" value="{{old('adresse')}}" name="adresse"   placeholder="adresse" style="height: 100%">
            <label for="floatingInputGroup1" style="height: 100%" class="label">Adresse</label>
        </div>
    </div>
    <div class="input-group mb-3" style="height: 60px">
        <span class="input-group-text" style="height: 100%">cni</span>
        <div class="form-floating" style="height: 100%">
            <input type="text" class="form-control" id="floatingInputGroup1" value="{{old('cni')}}" name="cni"   placeholder="cni" style="height: 100%">
            <label for="floatingInputGroup1" style="height: 100%" class="label">Cni</label>
        </div>
    </div>
    <div class="input-group mb-3" style="height: 60px">
        <span class="input-group-text" style="height: 100%">email</span>
        <div class="form-floating" style="height: 100%">
            <input type="text" class="form-control" id="floatingInputGroup1" value="{{old('email')}}" name="email"   placeholder="email" style="height: 100%">
            <label for="floatingInputGroup1" style="height: 100%" class="label">email</label>
        </div>
    </div>
    <div >
        <input name="photo" type="file" class="object rounded-start">
    </div>
    <div class="button">
        <button type="submit" class="btn btn-outline-success float-end">sauvegarder</button>
    </div>
</form>
