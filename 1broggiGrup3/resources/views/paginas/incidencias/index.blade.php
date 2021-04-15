
@extends('index')
@section('cuerpo')
@include('partials.mensajes')

<div class="card border-primary mb-3 " style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card">
        <button type="submit" class="btn btn-primary col-12" id="siguiente">Crear incidencia</button>
        <button type="button" class="btn btn-secondary col-12" id="cancelar">Tancar sessió</button>
    </div>
</div>
