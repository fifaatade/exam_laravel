@if($location)
    <div>
        <a class="btn btn-danger text-body-secondary mt-5" href="{{route('location')}}">retour</a>
    </div>
    <div class="show">
        <div id="carouselExample" class="carousel slide" style="width: 650px">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset($location->voiture['image_principale'])}}" class="d-block w-100 object" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset($location->voiture['image_2'])}}" class="d-block w-100 object" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset($location->voiture['image_3'])}}" class="d-block w-100 object" alt="...">
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
        <div class="card mb-5 mt-5 " style="width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-center">{{$location->voiture['nom_voiture']}}</h2>
                <h6 class="card-subtitle mb-2 text-body-secondary"><b>Boite à vitesse: </b>{{$location->voiture['boite_vitesse']}}</h6>
                <p class="card-text"><b>puissance: </b>{{$location->voiture['puissance']}}</p>
                <p class="card-text"><b>nombre de porte: </b>{{$location->voiture['nbre_porte']}}</p>
                <p class="card-text"><b>carburant: </b>{{$location->voiture['carburant']}}</p>
                <p class="card-text"><b>nombre de cylindre: </b>{{$location->voiture['nbre_cylindre']}}</p>
                <p class="card-text"><b>soupape: </b>{{$location->voiture['soupape']}}</p>
                <p class="card-text"><b>vitesse maximale: </b>{{$location->voiture['vitesse_max']}}</p>
                <p class="card-text"><b>frein: </b>{{$location->voiture['frein']}}</p>
                <p class="card-text"><b>acceleration: </b>{{$location->voiture['acceleration']}}</p>
                <p class="card-text"><b>couleur: </b>{{$location->voiture['couleur']}}</p>
                <p class="card-text"><b>date de sortie: </b>{{$location['date_sortie_voiture']}}</p>
                <p class="card-text"><b>date prévue de retour: </b>{{$location['date_prevue_retour']}}</p>
                <p class="card-text"><b>date de retour effectif: </b>{{$location['date_retour_effectif']}}</p>
            </div>
        </div>
    </div>
@endif