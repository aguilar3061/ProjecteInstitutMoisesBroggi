@extends('index')

@section('cuerpo')
@include('partials.mensajes')

<div class="card mt-4 col-12">
    <div class="card-body  col-12">
      <h5 class="card-title">Usuaris</h5>
      @if ($usuaris->isEmpty())
        <div class="alert alert-light" role="alert">
            No hay ningun usuario en la base de datos.
        </div>
      @else
        <table class="table col-12">
            <thead>
                <tr>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Correo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Rol</th>
                <th scope="col">Recurso</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuaris as $usuari)
                <tr>
                    <td>{{ $usuari->username }}</td>
                    <td>{{ $usuari->email }}</td>
                    <td>{{ $usuari->nom }}</td>
                    <td>{{ $usuari->cognoms }}</td>
                    <td>{{ $usuari->rol->nom }}</td>
                    <td>{{ $usuari->recurs->tipus_recurs->tipus }}</td>
                    <td>
                        <form action="{{ action([App\Http\Controllers\UsuariController::class, 'edit'], ['usuari' => $usuari->id ])}}">
                            @csrf
                            <button type="submit"  class="btn btn-secondary"><i class="fas fa-edit">Editar</i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ action([App\Http\Controllers\UsuariController::class, 'destroy'], ['usuari' => $usuari->id ]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash">Eliminar</i></button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <a href="{{ url('usuari/create') }}" class="btn btn-primary" id="fixedbutton">+ Nuevo usuario</a>
</div>
@endsection
