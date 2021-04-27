@extends('index')

@section('cuerpo')
    <recurso-update-component :recurso='{{ $recurso }}' :alertantes='{{ $alertantes }}' :tipo_recurso='{{ $tipo_recurso }}'> </recurso-update-component>
@endsection





<script>
    function myFunction(idElemento) {
      document.getElementById(idElemento).value = null;
    }
</script>
