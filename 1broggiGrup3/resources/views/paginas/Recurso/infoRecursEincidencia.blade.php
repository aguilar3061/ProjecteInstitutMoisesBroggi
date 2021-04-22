@extends('index')

@section('cuerpo')

<recurso-component :recurso='{{ $recurso }}' :municipios='{{ $municipios }}' :alertantes='{{ $alertantes }}' :tipo_recurso='{{ $tipo_recurso }}'></recurso-component>




@endsection
