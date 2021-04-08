
@extends('plantillas.navbar')

@section('body')
  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Buscador</div>
        <div class="card-body">
            <form>
                <fieldset>
                    <div class="form-group row">
                        <label for="provincia" class="col-2 col-form-label">Tipo de recurso</label>
                        <div class="col-10">
                            <select class="form-control" id="provincia" name="provincia">
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="municipio" class="col-2 col-form-label">Seleccionar recurso</label>
                        <div class="col-10">
                            <select class="form-control" id="municipio" name="municipio">
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4">Prioritat: </label>
                        <div class="col-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radio1" id="radio1" value="1">
                                <label class="form-check-label" for="radio">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radio2" id="radio2" value="2">
                                <label class="form-check-label" for="radio">2</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="siguiente">Buscar</button>
                </div>
            </form>
        </div>
  </div>
  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Recursos Asignables</div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Codi</th>
                <th scope="col">Tipus recurs</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td><button type="submit" class="btn btn-primary" id="siguiente">Asignar a incidencia</button></td>
              </tr>
            </tbody>
          </table>
    </div>
  </div>
  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Recursos Asignados</div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Codi</th>
                <th scope="col">Tipus recurs</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td><button type="submit" class="btn btn-primary" id="siguiente">Quitar asignacion</button></td>
              </tr>
            </tbody>
          </table>
    </div>

    <button type="submit" class="btn btn-primary" id="siguiente">Finalizar</button>
  </div>

@endsection
