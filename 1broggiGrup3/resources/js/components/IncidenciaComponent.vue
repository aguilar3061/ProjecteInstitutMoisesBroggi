<template>
<div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
    <form>
        <div class="card-header">Incidencia</div>
        <div class="card-body">
            <div class="card mt-2">
                <div class="card-header">Alertant</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="telefonAlertant" class="col-3 col-form-label">Telefono</label>
                        <div class="col-9">
                            <input class="form-control" type="number" id="telefonAlertant" name="telefonAlertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomAlertant" class="col-3 col-form-label">Nombre</label>
                        <div class="col-9">
                            <input class="form-control" type="text"  id="nomAlertant" name="nomAlertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cognomsAlertant" class="col-3 col-form-label">Apellidos</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="cognomsAlertant" name="cognomsAlertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adrecaAlertant" class="col-3 col-form-label">Dirección</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="adrecaAlertant" name="adrecaAlertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="municipis_id_Alertant" class="col-3 col-form-label">Municipio</label>
                        <div class="col-9">
                            <select class="form-control" id="municipis_id_Alertant" name="municipis_id_Alertant">
                                <option v-for="municipio in municipios" :key="municipio.id" :value="municipio.id" >{{ municipio.nom }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipus_alertants_id" class="col-3 col-form-label">Tipus alertant</label>
                        <div class="col-9">
                            <select class="form-control" id="tipus_alertants_id" name="tipus_alertants_id">
                                <option v-for="tipusalertant in tipusalertants" :key="tipusalertant.id" :value="tipusalertant.id" >{{ tipusalertant.tipus }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">Afectat</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="telefonAfectat" class="col-3 col-form-label">Telefono</label>
                        <div class="col-9">
                            <input class="form-control" type="number" id="telefonAfectat" name="telefonAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cip" class="col-3 col-form-label">Documento (DNI, TS/NSS)</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="cip" name="cip">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomAfectat" class="col-3 col-form-label">Nombre</label>
                        <div class="col-9">
                            <input class="form-control" type="text"  id="nomAfectat" name="nomAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cognomsAfectat" class="col-3 col-form-label">Apellidos</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="cognomsAfectat" name="cognomsAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edadAfectat" class="col-3 col-form-label">Edad</label>
                        <div class="col-9">
                            <input class="form-control" type="number" id="edadAfectat" name="edadAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Sexo: </label>
                        <div class="col-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexes_id" id="radioMujer" value="2">
                                <label class="form-check-label" for="sexes_id">Mujer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexes_id" id="radioHombre" value="1">
                                <label class="form-check-label" for="sexes_id">Hombre</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">Incidencia</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="fechaHora" class="col-3 col-form-label">Fecha y hora</label>
                        <div class="col-9">
                            <input class="form-control" type="datetime-local"  id="fechaHora" name="fechaHora">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="adreca" class="col-3 col-form-label">Dirección</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="adreca" name="adreca">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adreca_complement" class="col-3 col-form-label">Complemento dirección</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="adreca_complement" name="adreca_complement">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcio" class="col-3 col-form-label">Descripción</label>
                        <div class="col-9">
                            <textarea class="form-control" id="descripcio" rows="3" name="descripcio"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nom_metge" class="col-3 col-form-label">Nombre médico</label>
                        <div class="col-9">
                            <input class="form-control" type="text"  id="nom_metge" name="nom_metge">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipus_incidencia_id" class="col-3 col-form-label">Tipus Incidencia</label>
                        <div class="col-9">
                            <select class="form-control" id="tipus_incidencia_id" name="tipus_incidencia_id">
                                <option v-for="tipusincidencia in tipusincidencies" :key="tipusincidencia.id" :value="tipusincidencia.id" >{{ tipusincidencia.tipus }}</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="municipis_id_Alertant" class="col-3 col-form-label">Municipio</label>
                        <div class="col-9">
                            <select class="form-control" id="municipis_id_Alertant" name="municipis_id_Alertant">
                                <option v-for="municipio in municipios" :key="municipio.id" :value="municipio.id" >{{ municipio.nom }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-secondary" id="Finalizar">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="Finalizar">Finalizar</button>
        </div>
    </form>
</div>
</template>

<script>
    export default {
        props: {
            recursos: {
                type: Array,
                required: false
            },
            tiporecursos:{
                type: Array,
                required: false
            },
            provincias:{
                type: Array,
                required: false
            },
            municipios:{
                type: Array,
                required: false
            },
            tipusalertants:{
                type: Array,
                required: false
            }
            ,
            tipusincidencies:{
                type: Array,
                required: false
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
