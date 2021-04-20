@extends('index')
@section('cuerpo')
@include('partials.mensajes')

<div style="text-align:center; padding-top:20em">
    <br>
    <h2 class="text-primary" style="font-weight: bold"> Bienvenido a la Administracion del 061 </h2>

    <div style="list-style-type:none;">
        <li>
            <ul>
                <form action="{{ url('/alertant') }}">
                    <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 20px; margin-top: 2%">Administrar Alertantes</button>
                </form>
            </ul>
            <ul>
                <form action="{{ url('/recurs') }}">
                    <button class="btn btn-primary btn-lg" style="border-radius: 20px; margin-top: 2%">Administrar Recursos</button>
                </form>
            </ul>
            <ul>
                <form action="{{ url('/usuari') }}">
                    <button class="btn btn-primary btn-lg" style="border-radius: 20px; margin-top: 2%">Administrar Usuarios</button>
                </form>
            </ul>
        </li>   
    </div>
</div> 
  {{-- paginaPrincipalA --}}
@endsection
