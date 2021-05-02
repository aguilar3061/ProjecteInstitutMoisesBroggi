@extends('index')
@section('cuerpo')
@include('partials.mensajes')

<div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%; border-color: #0edcd8 !important; margin-left: 25%; margin-right: 25%; width: 685px;">

    <div class="card-header" style="color: #2780e3; font-weight: bold; font-size:20px;">Administración</div>

        <div class="card-body">

            <a class="btn btn-primary btn-lg" href="{{ url('/alertant') }}" style="border-radius: 20px; margin-top: 2%">
                Administrar Alertantes
            </a>
            <a class="btn btn-primary btn-lg" href="{{ url('/recurs') }}" style="border-radius: 20px; margin-top: 2%">
                Administrar Recursos
            </a>
            <a class="btn btn-primary btn-lg" href="{{ url('/usuari') }}" style="border-radius: 20px; margin-top: 2%">
                Administrar Usuarios
            </a>

        </div>

    </div>


@endsection
