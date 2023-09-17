<div>
    <a class="btn btn-outline-danger text-body-secondary mt-5 mb-3" href="{{route('voiture')}}">retour</a>
</div>
<div class="d-flex sidebar">
    <form action="{{route('storeMarque')}}" method="POST" enctype="multipart/form-data" class="me-5 mt-5">
        @csrf
        <div class="input-group mb-3" style="height: 60px">
            <span class="input-group-text" style="height: 100%">marque</span>
            <div class="form-floating" style="height: 100%">
                <input type="text" class="form-control" id="floatingInputGroup1" value="{{old('name')}}" name="name"   placeholder="nom" style="height: 100%">
            </div>
        </div>
        <select class="form-select mb-3" aria-label="Default select example" name="id_categorie" style="width: 100%">
            <option selected>Choisir une catégorie</option>
            @foreach($categorie as $item)
                <option value="{{$item['id']}}">{{$item['name']}}</option>
            @endforeach
        </select>
        <div class="button">
            <button type="submit" class="btn mt-3 btn-outline-success">enrégistrer</button>
        </div>
    </form>
    @if($marque)
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nom</th>
                <th scope="col">catégorie</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($marque as $items)
                    <tr>
                        <th scope="row">{{$items->id}}</th>
                        <td>{{$items['name']}}</td>
                        <td>{{$items->categorie->name}}</td>
                        <td class=" text-center ">
                            <a class="btn btn-outline-warning mx-2 my-2"  href="{{route('editMarque',$items['id'])}}" >modifier</a>
                            <a class="btn btn-outline-danger" href="{{route('deleteMarque',$items['id'])}}">supprimer</a>
                        </td>                
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>