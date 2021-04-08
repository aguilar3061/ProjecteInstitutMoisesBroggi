
@extends('plantillas.navbar')

@section('body')
  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Información accidente</div>
    <div class="card-body">
        <form>
            <fieldset>
                <div class="form-group row">
                    <label for="accidente" class="col-4 col-form-label">Accidente</label>
                    <div class="col-8">
                      <input class="form-control" type="text" id="accidente" name="accidente">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="enfermedadSP" class="col-4 col-form-label">Enfermedad sitió público</label>
                    <div class="col-8">
                      <input class="form-control" type="text" id="enfermedadSP" name="enfermedadSP">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="EnfermedadD" class="col-4 col-form-label">Enfermedad domicilio</label>
                    <div class="col-8">
                      <input class="form-control" type="text" id="EnfermedadD" name="EnfermedadD">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="consultaMedica" class="col-4 col-form-label">Consulta médica</label>
                    <div class="col-8">
                      <input class="form-control" type="text" id="consultaMedica" name="consultaMedica">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="transporte" class="col-4 col-form-label">Transporte</label>
                    <div class="col-8">
                      <input class="form-control" type="text" id="transporte" name="transporte">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="transporteSanitario" class="col-4 col-form-label">Transporte sanitario</label>
                    <div class="col-8">
                      <input class="form-control" type="text" id="transporteSanitario" name="transporteSanitario">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="transporteInternoH" class="col-4 col-form-label">Transporte Interno hospitalario no critico</label>
                    <div class="col-8">
                      <input class="form-control" type="text" id="transporteInternoH" name="transporteInternoH">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="transporteSecundario" class="col-4 col-form-label">Transporte secundario</label>
                    <div class="col-8">
                      <input class="form-control" type="text" id="transporteSecundario" name="transporteSecundario">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="textOperadorDemanda" class="col-4 col-form-label">Operador de demanda</label>
                    <div class="col-8">
                        <textarea class="form-control" id="textOperadorDemanda" rows="3" name="textOperadorDemanda"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="codOperadorDemanda" class="col-4 col-form-label">Codigo operador de demanda</label>
                    <div class="col-8">
                        <input class="form-control" type="text" id="codOperadorDemanda" name="codOperadorDemanda">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="consultaMedicaText" class="col-4 col-form-label">Consulta médica</label>
                    <div class="col-8">
                        <textarea class="form-control" id="consultaMedicaText" name="consultaMedicaText" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="codMedico" class="col-4 col-form-label">Codigo médico</label>
                    <div class="col-8">
                        <input class="form-control" type="text" id="codMedico" name="codMedico">
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
