<template>
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
                                <input class="form-check-input" type="radio" name="radioSexo" id="radioMujer" value="2">
                                <label class="form-check-label" for="radioSexo">Mujer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioSexo" id="radioHombre" value="1">
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
                    <div class="form-group row">
                            <label for="tipusRecurs" class="col-2 col-form-label">Tipo de recurso</label>
                            <div class="col-10">
                                <select class="form-control" id="tipusRecurs" name="tipusRecurs">
                                    <option v-for="tipoRecurs in tipoRecursos" :key="tipoRecurs.id" :value="ipoRecurs.id" >{{ tipoRecurs.tipus }}</option>
                                </select>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label for="recurs" class="col-2 col-form-label">Seleccionar recurso</label>
                        <div class="col-10">
                            <select class="form-control" id="recurs" name="recurs">
                                <option v-for="recurs in recursos" :key="recurs.id"  :value="recurs.id" >{{ recurs.codi }}</option>
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
                    <button type="button" class="btn btn-secondary" id="Finalizar">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="Finalizar">Finalizar</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            recursos: {
                type: Array,
                required: false
            },
            tipoRecursos:{
                type: Array,
                required: false
            }
        },
        data() {
            return{
                tipoRecursos:[],
                recursos: []
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){

        },
        methods: {
            selectTipusRecursos() {

            },
            selectRecursos(){

            }
        }
    }
</script>
