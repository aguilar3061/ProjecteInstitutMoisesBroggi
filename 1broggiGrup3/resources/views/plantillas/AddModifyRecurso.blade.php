@extends('index')

@section('cuerpo')
  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Modificar recurso</div>
    <div class="card-body">
        <form>
            <fieldset>

              <div class="form-group row">
                <label for="num_id" class="col-sm-2 col-form-label">Numero de identificación</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="num_id" aria-describedby="num_id" placeholder="Numero de identificación">
                </div>
              </div>




              <div class="form-group row">
                <label for="recurso" class="col-sm-2 col-form-label">Tipo de recurso</label>
                <div class="col-sm-10">
                    <select class="form-control" id="recurso">
                        <option>Seleccionar tipo de recurso</option>

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

