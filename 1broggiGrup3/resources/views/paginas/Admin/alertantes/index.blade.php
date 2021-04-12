@extends('index')

@section('cuerpo')
@include('partials.mensajes')

<div class="card mt-4 col-12">
    <div class="card-body  col-12">
      <h5 class="card-title">Alertantes</h5>
      @if ($alertants->isEmpty())
        <div class="alert alert-light" role="alert">
            No hay ningun alertante en la base de datos.
        </div>
      @else
        <table class="table col-12">
            <thead>
                <tr>
                <th scope="col">Telefono</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Dirección</th>
                <th scope="col">Municipio</th>
                <th scope="col">Tipo alertante</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alertants as $alertant)
                <tr>
                    <td>{{ $alertant->telefon }}</td>
                    <td>{{ $alertant->nom }}</td>
                    <td>{{ $alertant->cognoms }}</td>
                    <td>{{ $alertant->adreca }}</td>
                    <td>{{ $alertant->municipi->nom }}</td>
                    <td>{{ $alertant->tipus_alertant->tipus }}</td>
                    <td>
                        <form action="{{ action([App\Http\Controllers\AlertantController::class, 'edit'], ['alertant' => $alertant->id ])}}">
                            @csrf
                            <button type="submit"  class="btn btn-secondary"><i class="fas fa-edit">Editar</i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ action([App\Http\Controllers\AlertantController::class, 'destroy'], ['alertant' => $alertant->id ]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash">Eliminar</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $alertants->links() }}
        @endif
    </div>
    <a href="{{ url('alertant/create') }}" class="btn btn-primary" id="fixedbutton">+ Nuevo alertante</a>
</div>
@endsection
