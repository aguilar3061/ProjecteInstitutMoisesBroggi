@extends('index')

@section('cuerpo')

<recurso-component :recurso='{{ $recurso }}' :municipios='{{ $municipios }}' :alertantes='{{ $alertantes }}' :tipo_recurso='{{ $tipo_recurso }}'></recurso-component>

<div class="mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <a href="{{ url('/formRecursIncidencia') }}" ><button type="button" class="btn btn-primary col-12" id="guardar">VAMOS A ALLA</button></a>
</div>


@endsection
