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
                    <a class="nav-link" href="{{ url('/alertant') }}" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                        ADMIN ALERTANTE
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/recurs') }}" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                        ADMIN RECURSOS
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="{{ url('/usuari') }}" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                        ADMIN USUARIOS
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="{{ url('/incidencia') }}" id="." role="button"  aria-haspopup="true" aria-expanded="false">
                        Incidencias
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
