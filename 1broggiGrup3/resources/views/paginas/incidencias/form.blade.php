
@extends('plantillas.navbar')

@section('body')
  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Incidencia</div>
    <div class="card-body">
        <form>
            <fieldset>

                <div class="form-group row">
                    <label for="fecha" class="col-2 col-form-label">Fecha</label>
                    <div class="col-10">
                      <input class="form-control" type="date"  id="fecha" name="fecha">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alertante" class="col-2 col-form-label">Alertante</label>
                    <div class="col-10">
                      <input class="form-control" type="text"  id="alertante" name="alertante">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telefono" class="col-2 col-form-label">Telefono</label>
                    <div class="col-10">
                      <input class="form-control" type="number" id="telefono" name="telefono">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="provincia" class="col-2 col-form-label">Provincia</label>
                    <div class="col-10">
                        <select class="form-control" id="provincia" name="provincia">
                            <option>1</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="municipio" class="col-2 col-form-label">Municipio</label>
                    <div class="col-10">
                        <select class="form-control" id="municipio" name="municipio">
                            <option>1</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="direccion" class="col-2 col-form-label">Dirección</label>
                    <div class="col-10">
                      <input class="form-control" type="text" id="direccion" name="direccion">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="complementoDireccion" class="col-2 col-form-label">Complemento dirección</label>
                    <div class="col-10">
                      <input class="form-control" type="text" id="complementoDireccion" name="complementoDireccion">
                    </div>
                </div>
            </fieldset>
            <div class="text-right">
                <button type="button" class="btn btn-secondary" id="cancelar">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="siguiente">Siguiente</button>
            </div>
          </form>
    </div>
  </div>
@endsection
