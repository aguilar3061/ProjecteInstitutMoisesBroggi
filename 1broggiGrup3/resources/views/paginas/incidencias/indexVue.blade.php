
@extends('index')
@section('cuerpo')
@include('partials.mensajes')

<div class="card border-primary mb-3 ">
    <div class="card">
        <incidencies-component :recursos="{{ $recursos }}" :tiporecursos="{{ $tiporecursos }}"  :provincias="{{ $provincias }}" :municipios="{{ $municipios }}" :tipusalertants="{{ $tipusalertants }}" :tipusincidencies="{{ $tipusincidencies }}" ></incidencies-component>
    </div>
</div>
@endsection
