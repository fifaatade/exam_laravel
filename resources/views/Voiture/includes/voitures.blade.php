<div class="spaceLink mb-5 mt-5">
    <a class="btn btn-danger text-body-secondary mt-5 mb-3" href="{{route('home')}}">retour</a>
    <a class="btn btn-success text-body-secondary mt-5 mb-3" href="{{route('Voitures')}}">ajouter une voiture</a>
</div>
<div class="d-flex sidebar">
  <ul class="me-3">
    <li class="mb-3"><a href="{{route('categorie')}}">ajouter une catégorie</a></li>
    <li class="mb-3"><a href="{{route('marque')}}">ajouter une marque</a></li>
    <li class=""><a href="{{route('modele')}}">ajouter un modèle</a></li>
  </ul>
  @if($voiture)
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">catégorie</th>
          <th scope="col">marque</th>
          <th scope="col">modèle</th>
          <th scope="col">année</th>
          <th scope="col">nom</th>
          <th scope="col">couleur</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($voiture as $items)
          <tr>
            <th scope="row">{{$items->id}}</th>
            <td>{{$items->categorie->name}}</td>
            <td>{{$items->marque->name}}</td>
            <td>{{$items->modele->modele_name}}</td>
            <td>{{$items->modele->annee}}</td>
            <td>{{$items->nom_voiture}}</td>
            <td>{{$items->couleur}}</td>
            <td class=" text-center ">
              <a class="btn btn-info mx-2 my-2"  href="{{route('showVoiture',$items['id'])}}" >voir plus</a>
          </td>                          
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>