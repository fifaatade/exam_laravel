@if($client_list)
    <div class="spaceLink mb-5 mt-5">
        <a href=""><button type="submit" class="btn btn-success">gestion des locations</button></a>
        <a href=""><button type="submit" class="btn btn-primary ">gestion des voitures</button></a>
        <a href="{{route('Client')}}"><button type="submit" class="btn btn-warning ">ajouter un client</button></a>
    </div>
    <table class="table table-bordered" >
        <thead>
        <tr>
            <th class="text-center" scope="col">Numéro</th>
            <th class="text-center" scope="col">Nom</th>
            <th class="text-center" scope="col">Prénoms</th>
            <th class="text-center" scope="col">Tel</th>
            <th class="text-center" scope="col">Adresse</th>
            <th class="text-center" scope="col">Photo</th>
            <th class="text-center" scope="col">Cni</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
           @foreach($client_list as $items)
                <tr>
                    <th scope="row">{{$items['id']}}</th>
                    <th scope="row" ><div class="center"><img class="rounded object " src="{{asset($items['photo'])}}" alt="" width="150px" height="150px"></div></th>
                    <td class=" text-center ">{{$items['nom']}}</td>
                    <td class=" text-center ">{{$items['prenom']}}</td>
                    <td class=" text-center ">{{$items['tel']}}</td>
                    <td class="text-center">{{$items['adresse']}}</td>
                    <td class="text-center">{{$items['cni']}}</td>
                    <td class="text-center">{{$items['email']}}</td>
                    <td class="text-center d-flex justify-content-center align-items-center" scope="col">
                        <a href="{{route('deleteClient',$items['id'])}}"><button type="button" class="btn btn-outline-danger">supprimer</button></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @if($client_list)
        {{$client_list->links()}}
    @endif
@endif
