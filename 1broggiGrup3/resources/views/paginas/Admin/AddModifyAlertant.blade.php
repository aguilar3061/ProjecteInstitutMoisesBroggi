@extends('index')

@section('cuerpo')
  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Modificar alertante</div>
    <div class="card-body">
        <form>
            <fieldset>

              <div class="form-group row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" aria-describedby="nombre" placeholder="Nombre">
                </div>
              </div>

              <div class="form-group row">
                <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="apellidos" aria-describedby="apellidos" placeholder="Apellidos">
                </div>
              </div>

              <div class="form-group row">
                <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="telefono" aria-describedby="telefono" placeholder="Teléfono">
                </div>
              </div>

              <div class="form-group row">
                <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="direccion" aria-describedby="direccion" placeholder="Dirección">
                </div>
              </div>

              <div class="form-group row">
                <label for="municipio" class="col-sm-2 col-form-label">Municipio</label>
                <div class="col-sm-10">
                    <select class="form-control" id="select_municipio">
                        <option>Seleccionar municipio</option>

                      </select>
                </div>
              </div>


              <div class="form-group row">
                <label for="alertante" class="col-sm-2 col-form-label">Tipo de alertante</label>
                <div class="col-sm-10">
                    <select class="form-control" id="select_alertante">
                        <option>Seleccionar tipo de alertante</option>

                      </select>
                </div>
              </div>



              <div class="text-right">
                <button type="button" class="btn btn-danger" id="cancelar">Cancelar</button>
                <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
              </div>
            </fieldset>
          </form>
    </div>
  </div>
@endsection
