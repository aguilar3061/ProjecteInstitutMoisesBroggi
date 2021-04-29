@extends('index')

@section('cuerpo')

<recurso-component :recurso='{{ $recurso }}' :municipios='{{ $municipios }}' :alertantes='{{ $alertantes }}' :tipo_recurso='{{ $tipo_recurso }}' :user-logued={{ $userLogued }}></recurso-component>




@endsection
