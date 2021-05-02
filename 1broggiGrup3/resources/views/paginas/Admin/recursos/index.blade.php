@extends('index')
@section('cuerpo')
@include('partials.mensajes')

<div class="card mt-4 col-12" style="border-color: #0edcd8 !important;">
    <div class="card-body  col-12">
      <h5 class="card-title" style="color: #2780e3; font-weight: bold; font-size:20px;">Recursos</h5>
      @if ($recursos->isEmpty())
        <div class="alert alert-light" role="alert">
            No hay ningun usuario en la base de datos.
        </div>
      @else
        <table class="table col-12">
            <thead>
                <tr>
                <th scope="col" style="color: #d53677; font-weight: bold;">Tipo de recurso</th>
                <th scope="col" style="color: #d53677; font-weight: bold;">Codigo del recurso</th>
                <th scope="col" style="color: #d53677; font-weight: bold;">Activo</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recursos as $recurso)
                <tr>
                    <td>{{ $recurso->tipus_recurs->tipus }}</td>
                    <td>{{ $recurso->codi }}</td>
                    <td>
                        @if ($recurso->actiu == true)
                            <input class="check" type="checkbox" value="0" id="CheckedActiu" checked disabled>
                        @else
                            <input class="check" type="checkbox" value="1" id="CheckedActiu" disabled>
                        @endif
                    </td>
                    <td>
                        <form action="{{ action([App\Http\Controllers\RecursController::class, 'edit'], ['recur' => $recurso->id ])}}">
                            @csrf
                            <button type="submit"  class="btn btn-secondary"><i class="fas fa-edit">Editar</i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ action([App\Http\Controllers\RecursController::class, 'destroy'], ['recur' => $recurso->id ]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash">Eliminar</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $recursos->links() }}
        @endif
    </div>
    <a href="{{ url('recurs/create') }}" class="btn btn-primary" id="fixedbutton">+ Nuevo recurso</a>
</div>
@endsection
