<div>
    <a class="btn btn-danger text-body-secondary mt-5 mb-3" href="{{route('voiture')}}">retour</a>
</div>
<div class="d-flex sidebar">
    <form action="{{route('categorieStore')}}" method="POST" enctype="multipart/form-data" class="me-5 mt-5">
        @csrf

        <div class="input-group mb-3" style="height: 60px">
            <span class="input-group-text" style="height: 100%">catégorie</span>
            <div class="form-floating" style="height: 100%">
                <input type="text" class="form-control" id="floatingInputGroup1" value="{{old('name')}}" name="name"   placeholder="nom" style="height: 100%">
            </div>
        </div>
        <div class="button">
            <button type="submit" class="btn mt-3 btn-success">enrégistrer</button>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">nom</th>
            <th scope="col">action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categorie_list as $items)

                <tr>
                    <th scope="row">{{$items['id']}}</th>
                    <td>{{$items['name']}}</td>
                    <td class=" text-center ">
                        <a class="btn btn-warning mx-2 my-2"  href="{{route('editCategorie',$items['id'])}}" >modifier</a>
                        <a class="btn btn-danger" href="{{route('deleteCategorie',$items['id'])}}">supprimer</a>
                    </td>                
                </tr>
            @endforeach
        </tbody>
    </table>
</div>