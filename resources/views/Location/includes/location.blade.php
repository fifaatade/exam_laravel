<div class="spaceLink mb-5 mt-5">
    <a class="btn btn-danger text-body-secondary mt-5 mb-3" href="{{route('home')}}">retour</a>
    <a class="btn btn-warning text-body-secondary mt-5 mb-3" href="{{route('locations')}}">ajouter une location</a>
</div>
@if($location)
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">client</th>
          <th scope="col">modèle de voiture</th>
          <th scope="col">marque</th>
          <th scope="col">année</th>
          <th scope="col">date de sortie</th>
          <th scope="col">date prévu de retour</th>
          <th scope="col">date de retour</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($location as $items)
          <tr>
            <th scope="row">{{$items->id}}</th>
            <th scope="row">{{$items->client->nom}}</th>
            <td>{{$items->modele->modele_name}}</td>
            <td>{{$items->marque->name}}</td>
            <td>{{$items->modele->annee}}</td>
            <td>{{$items->date_sortie_voiture}}</td>
            <td>{{$items->date_prevue_retour}}</td>
            <td>
                <form action="{{route('addDate')}}" method="POST" enctype="multipart/form-data" class="me-5 mt-5">
                    @csrf
                    <input type="date" name="date_retour_effectif" class="form-control" value="{{$items->date_retour_effectif}}" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                </form>
            </td>
            <td class="text-center ">
              <a class="btn btn-warning mx-2 my-2"  href="{{route('showLocation',$items['id'])}}" >voir plus</a>
          </td>                          
        </tr>
        @endforeach
      </tbody>
    </table>
@endif