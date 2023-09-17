@if($voiture)
    <div>
        <a class="btn btn-outline-danger text-body-secondary mt-5" href="{{route('voiture')}}">retour</a>
    </div>
    <h1 class="text-center">FICHE TECHNIQUE {{$voiture['id']}}</h1>
    <div class="card object mb-5 mt-5 " style="width: 60%;">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset($voiture['image_principale'])}}" class="d-block w-100 object" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset($voiture['image_2'])}}" class="d-block w-100 object" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset($voiture['image_3'])}}" class="d-block w-100 object" alt="...">
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">{{$voiture['nom_voiture']}}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary"><b>Boite à vitesse: </b>{{$voiture['boite_vitesse']}}</h6>
            <p class="card-text"><b>puissance: </b>{{$voiture['puissance']}}</p>
            <p class="card-text"><b>nombre de porte: </b>{{$voiture['nbre_porte']}}</p>
            <p class="card-text"><b>carburant: </b>{{$voiture['carburant']}}</p>
            <p class="card-text"><b>nombre de cylindre: </b>{{$voiture['nbre_cylindre']}}</p>
            <p class="card-text"><b>soupape: </b>{{$voiture['soupape']}}</p>
            <p class="card-text"><b>vitesse maximale: </b>{{$voiture['vitesse_max']}}</p>
            <p class="card-text"><b>frein: </b>{{$voiture['frein']}}</p>
            <p class="card-text"><b>acceleration: </b>{{$voiture['acceleration']}}</p>
            <p class="card-text"><b>couleur: </b>{{$voiture['couleur']}}</p>
            {{-- <div class="float-end">
                <a href="{{route('showVoiture',$voiture['id']-1)}}" class="btn btn-secondary text-body-secondary me-3">précédent</a>
                <a  href="{{route('showVoiture',$voiture['id']+1)}}" class="btn btn-secondary text-body-secondary">suivant</a>
            </div> --}}
        </div>
    </div>
@endif