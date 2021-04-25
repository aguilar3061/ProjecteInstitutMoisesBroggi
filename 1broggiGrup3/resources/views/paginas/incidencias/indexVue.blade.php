
@extends('index')
@section('cuerpo')
@include('partials.mensajes')

<div class="border-primary mb-3 ">
    <div >
        <incidencies-component :recursos="{{ $recursos }}" :tiporecursos="{{ $tiporecursos }}" :provincias="{{ $provincias }}" :municipios="{{ $municipios }}" :tipusalertants="{{ $tipusalertants }}" :tipusincidencies="{{ $tipusincidencies }}" :alertants="{{ $alertants }}" ></incidencies-component>
    </div>
</div>
@endsection
