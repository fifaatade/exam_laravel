<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css
    ">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield('title')</title>
</head>
<body class="">
    <div class="background">
      <nav class="navbar bg-body-tertiary">
          <div class="container-fluid">
            <a class="navbar-brand d-flex nav "  href="#">
              <img src="{{asset('images/LOGO.webp')}}" alt="Logo" width="70" height="70" class="d-inline-block align-text-top object">
              <b>GesCar</b>
            </a>
            @if(Auth::check())
                  <div>
                    <a href="{{route('logout')}}" class="btn btn-danger ms-3 float-end"> Se deconnecter</a>
                    {{$nom.' '. $prenom}}
                  </div>
              @endif
          </div>
        </nav>
        @if (session('errors'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                        <li>{{session('errors')}}</li><br />
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <ul>
                        <li>{{session('success')}}</li><br />
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
      @yield('content')
      

      <footer>
        <div class="container">
            <p>© 2023 GesCar, Inc , votre compagnie automobile..</p>
        </div>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js
      ">
      </script>
    </div>
</body>
</html>