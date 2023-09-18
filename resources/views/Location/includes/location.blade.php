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
          <th scope="col">date de retour effectif</th>
          <th scope="col">status</th>
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
                <form action="{{route('addDate',$items['id'])}}" method="POST" enctype="multipart/form-data" class=" d-flex">
                    @csrf
                    <input type="date" name="new_date_retour_effectif" class="form-control" value="{{$items->date_retour_effectif}}" >
                    <button type="submit" class="btn btn-success mx-2 my-2"  >save</button>
                </form>
            </td>
            @if($items->status==1)
              <td class="btn bg-success mx-2 my-2" >délai respecté</td>
            @else
              <td class="btn bg-danger mx-2 my-2" >délai non respecté</td>
            @endif
            <td class="text-center ">
              <a class="btn btn-warning mx-2 my-2"  href="{{route('showLocation',$items['id'])}}" >voir plus</a>
          </td>                          
        </tr>
        @endforeach
      </tbody>
    </table>
@endif