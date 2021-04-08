
@extends('plantillas.navbar')

@section('body')
  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Alertante</div>
    <div class="card-body">
        <form>
            <fieldset>
                <div class="form-group row">
                    <label for="nombre" class="col-4 col-form-label">Nombre</label>
                    <div class="col-8">
                      <input class="form-control" type="text"  id="nombre" name="nombre">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="apellidos" class="col-4 col-form-label">Apellidos</label>
                    <div class="col-8">
                      <input class="form-control" type="text" id="apellidos" name="apellidos">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="edad" class="col-4 col-form-label">Edad</label>
                    <div class="col-8">
                      <input class="form-control" type="number" id="edad" name="edad">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4">Sexo: </label>
                    <div class="col-8">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioSexo" id="radioMujer" value="option1">
                            <label class="form-check-label" for="radioSexo">Mujer</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="radioSexo" id="radioHombre" value="option1">
                            <label class="form-check-label" for="radioSexo">Hombre</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="documento" class="col-4 col-form-label">Documento (DNI, TS/NSS)</label>
                    <div class="col-8">
                      <input class="form-control" type="text" id="documento" name="documento">
                    </div>
                </div>
            </fieldset>
            <div class="text-right">
                <button type="button" class="btn btn-secondary" id="cancelar">anterior</button>
                <button type="submit" class="btn btn-primary" id="siguiente">Siguiente</button>
            </div>
          </form>
    </div>
  </div>
@endsection
