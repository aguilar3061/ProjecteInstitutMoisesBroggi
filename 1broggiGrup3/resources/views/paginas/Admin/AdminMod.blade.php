@extends('index')
@section('cuerpo')
<div>
    <div class="text-right">
        <button type="button" class="btn btn-success" style="margin-right: 5%; margin-top: 5%;">Crear</button>
</div>

<div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr class="table-primary">
                <th scope="col">Type</th>
                <th scope="col">Column heading</th>
                <th scope="col">Column heading</th>
                <th scope="col">Column heading</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr class="table-active">
                <th scope="row">Active</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <th><button type="button" class="btn btn-primary">Cambiar</button> | <button type="button" class="btn btn-danger">Borrar</button></th>
            </tr>
            <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <th><button type="button" class="btn btn-primary">Cambiar</button> | <button type="button" class="btn btn-danger">Borrar</button></th>
            </tr>
            <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <th><button type="button" class="btn btn-primary">Cambiar</button> | <button type="button" class="btn btn-danger">Borrar</button></th>
            </tr>
            <tr>
                <th scope="row">Default</th>
                <td>Column content</td>
                <td>Column content</td>
                <td>Column content</td>
                <th><button type="button" class="btn btn-primary">Cambiar</button> | <button type="button" class="btn btn-danger">Borrar</button></th>
            </tr>

            </tbody>
        </table>
    </div>
</div>


</div>

@endsection
