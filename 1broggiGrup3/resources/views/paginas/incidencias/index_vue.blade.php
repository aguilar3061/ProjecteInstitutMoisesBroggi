
@extends('plantillas.plantilla')

@section('body')

@include('partials.mensajes')

<incidencies-component :recursos="recursos" :tipoRecursos="tipoRecursos"></incidencies-component>

@endsection
