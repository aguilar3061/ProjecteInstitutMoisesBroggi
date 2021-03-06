
@extends('index')

@section('cuerpo')
  <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <div class="card-header">Usuario</div>
    <div class="card-body">
        <form>
            <fieldset>

              <div class="form-group row">
                <label for="exampleInputName1" class="col-4 col-form-label">Nombre Usuario</label>
                <div class="col-8">
                <input type="email" class="form-control" id="exampleInputName1" aria-describedby="namelHelp" placeholder="Nombre usuario">
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputPassw1" class="col-4 col-form-label">Contraseña</label>
                <div class="col-8">
                <input type="email" class="form-control" id="exampleInputPassw1" aria-describedby="passwHelp" placeholder="Contraseña">
                </div>
              </div>

              <div class="form-group row">
                <label for="staticEmail" class="col-4 col-form-label">Correo</label>
                <div class="col-8">
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo">
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputnamel1" class="col-4 col-form-label">Nombre</label>
                <div class="col-8">
                <input type="email" class="form-control" id="exampleInputnamel1" aria-describedby="namelHelp" placeholder="Nombre">
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputSubname" class="col-4 col-form-label">Apellido</label>
                <div class="col-8">
                <input type="email" class="form-control" id="exampleInputSubname" aria-describedby="subnamelHelp" placeholder="Apellido">
                </div>
              </div>


              <div class="form-group row">
                <label for="rol" class="col-4 col-form-label">Rol</label>
                <div class="col-8">
                <select class="form-control" id="rol">
                  <option>1</option>
                  <option>2</option>
                </select>
                </div>
              </div>

              <div class="text-right">
                <button type="button" class="btn btn-primary">Primary</button>
              </div>
            </fieldset>
          </form>
    </div>
  </div>
@endsection
