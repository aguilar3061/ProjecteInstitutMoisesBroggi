@extends("plantillas.plantilla")
@section('navbar')

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="logo" width="60" height="60">
            </a>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ url('/') }}">Broggi </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                                Servicio 1
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                                Servicio 2
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                                Servicio 3
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="#" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                                Admin
                            </a>
                        </li>

                </ul>
            </div>
        </nav>
@endsection
