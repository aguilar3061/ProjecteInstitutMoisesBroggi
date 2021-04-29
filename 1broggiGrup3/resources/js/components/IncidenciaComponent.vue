<template>
<div class="border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%; margin-bottom: 5%;">
    <form>
        <div class="btn-group-toggle mt-2 ml-4" data-toggle="buttons">
            <label class="btn btn-info active">
                <input type="checkbox" checked autocomplete="off"  @click="showHelp()"> Ayuda Ingles
            </label>
        </div>
        <div class="card-body">
            <div class="card mt-2" style="border-color: #0edcd8 !important;">
                <div class="card-header" style="color: #2780e3; font-weight: bold; font-size:20px;">Alertant</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="telefonAlertant" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;" >Telefono</label>
                        <div class="col-9">
                            <input class="form-control" type="number" id="telefonAlertant" v-on:change="busacarAlertante()" name="telefonAlertant" v-model="incidencia.telefon_alertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomAlertant" class="col-3 col-form-label"  style="color: #d53677; font-weight: bold;" >Nombre</label>
                        <div class="col-9">
                            <label for="nomAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">What's your name ? <img src="img/speaker.png" @click="audioClick('frase1')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text"  id="nomAlertant" name="nomAlertant" v-model="incidencia.nomAlertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cognomsAlertant" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Apellidos</label>
                        <div class="col-9">
                            <label for="cognomsAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">What's your surname ? <img src="img/speaker.png" @click="audioClick('frase2')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text" id="cognomsAlertant" name="cognomsAlertant" v-model="incidencia.cognomsAlertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adrecaAlertant" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Dirección</label>
                        <div class="col-9">
                            <label for="adrecaAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">Where are you now ?  <img src="img/speaker.png" @click="audioClick('frase3')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text" id="adrecaAlertant" name="adrecaAlertant" v-model="incidencia.adrecaAlertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="municipis_id_Alertant" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Municipio</label>
                        <div class="col-9">
                            <select class="form-control" id="municipis_id_Alertant" name="municipis_id_Alertant" v-model="incidencia.municipis_idAlertant">
                                <option v-for="municipis_idAlertant in municipios" :key="municipis_idAlertant.id" :value="municipis_idAlertant.id" >{{ municipis_idAlertant.nom }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipus_alertants_id" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Tipus alertant</label>
                        <div class="col-9">
                            <select class="form-control" id="tipus_alertants_id" name="tipus_alertants_id" v-model="incidencia.tipus_alertants_idAlertant">
                                <option v-for="tipus_alertants_idAlertant in tipusalertants" :key="tipus_alertants_idAlertant.id" :value="tipus_alertants_idAlertant.id" >{{ tipus_alertants_idAlertant.tipus }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2" style="border-color: #0edcd8 !important;">
                <div class="card-header" style="color: #2780e3; font-weight: bold; font-size:20px;">Afectat</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="telefonAfectat" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Telefono</label>
                        <div class="col-9">
                            <input class="form-control" type="number" id="telefonAfectat" name="telefonAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cip" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Documento (DNI, TS/NSS)</label>
                        <div class="col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">Can you tell me an identification number of the victim ?  <img src="img/speaker.png" @click="audioClick('frase4')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text" id="cip" name="cip">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomAfectat" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Nombre</label>
                        <div class="col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">Can you tell me the name of the victim ?  <img src="img/speaker.png" @click="audioClick('frase5')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text"  id="nomAfectat" name="nomAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cognomsAfectat" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Apellidos</label>
                        <div class="col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">Can you tell me the surname of the victim ?  <img src="img/speaker.png" @click="audioClick('frase6')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text" id="cognomsAfectat" name="cognomsAfectat" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edadAfectat" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Edad</label>
                        <div class="col-9">
                            <input class="form-control" type="number" id="edadAfectat" name="edadAfectat" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3"  style="color: #d53677; font-weight: bold;">Sexo: </label>
                        <div class="col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">Can you tell me the sex of the victim ?  <img src="img/speaker.png" @click="audioClick('frase7')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexes_id" id="radioMujer" value="2" v-model="sexes_idAfectat" >
                                <label class="form-check-label" for="sexes_id">Mujer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexes_id" id="radioHombre" value="1" v-model="sexes_idAfectat">
                                <label class="form-check-label" for="sexes_id">Hombre</label>
                            </div>
                        </div>
                    </div>

                    <div style=" text-align: center;">
                        <button type="button" v-on:click="addToAfectats" class="btn-primary" style="width: 50%; " >Añadir afectado</button>
                    </div>
                    <table class="table col-12" id="tablaAfectat">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" style="color: #d53677; font-weight: bold;">Nombre afectado</th>
                                <th scope="col" style="color: #d53677; font-weight: bold;">Apellido</th>
                                <th scope="col" style="color: #d53677; font-weight: bold;">Telefono</th>
                                <th scope="col" style="color: #d53677; font-weight: bold;">Cip</th>
                                <th scope="col" style="color: #d53677; font-weight: bold;">Sexo</th>
                                <!-- <th scope="col">Eliminar</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-2" style="border-color: #0edcd8 !important;">
                <div class="card-header" style="color: #2780e3; font-weight: bold; font-size:20px;">Incidencia</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="fechaHora" class="col-3 col-form-label"  style="color: #d53677; font-weight: bold;">Fecha y hora</label>
                        <div class="col-9">
                            <input class="form-control" type="datetime-local"  id="fechaHora" name="fechaHora" v-model="incidencia.data">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="adreca" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Dirección</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="adreca" name="adreca"  v-model="incidencia.adreca">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adreca_complement" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Complemento dirección</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="adreca_complement" name="adreca_complement"  v-model="incidencia.adreca_complement">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcio" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Descripción</label>
                        <div class="col-9">
                            <textarea class="form-control" id="descripcio" rows="3" name="descripcio"  v-model="incidencia.descripcio"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nom_metge" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Nombre médico</label>
                        <div class="col-9">
                            <input class="form-control" type="text"  id="nom_metge" name="nom_metge" v-model="incidencia.nom_metge">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipus_incidencia_id" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Tipus Incidencia</label>
                        <div class="col-9">
                            <select class="form-control" id="tipus_incidencia_id" name="tipus_incidencia_id" v-model="incidencia.tipus_incidencies_id">
                                <option v-for="tipus_incidencies_id in tipusincidencies" :key="tipus_incidencies_id.id" :value="tipus_incidencies_id.id">{{ tipus_incidencies_id.tipus }}</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="municipis_id_Alertant" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Municipio</label>
                        <div class="col-9">
                            <select class="form-control" id="municipis_id_Alertant" name="municipis_id_Alertant" v-model="incidencia.municipis_id">
                                <option v-for="municipio in municipios" :key="municipio.id" :value="municipio.id" >{{ municipio.nom }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2" style="border-color: #0edcd8 !important;">
                <div class="card-header" style="color: #2780e3; font-weight: bold; font-size:20px;">Recursos</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="idTipoRecurso" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Tipus de recurso</label>
                        <div class="col-9">
                            <select class="form-control" id="idTipoRecurso" name="idTipoRecurso" @change="onChange($event)" >
                                <option v-for="tipusrecurs in tiporecursos" :key="tipusrecurs.id" :value="tipusrecurs.id" >{{ tipusrecurs.tipus }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recursos_id" class="col-3 col-form-label" style="color: #d53677; font-weight: bold;">Recurso</label>
                        <div class="col-9">
                            <select class="form-control" id="selectMedicalitzadaMike" name="selectMedicalitzadaMike" style="display: none;" >
                                <option v-for="recurs in filteredRecursos(1)" :key="recurs.id" :value="recurs.id" >{{ recurs.codi }}</option>
                            </select>
                            <select class="form-control" id="selectsanitaritzadaIndia" name="selectsanitaritzadaIndia" style="display: none;" >
                                <option v-for="recurs in filteredRecursos(2)" :key="recurs.id" :value="recurs.id" >{{ recurs.codi }}</option>
                            </select>
                            <select class="form-control" id="selectassitencialTango" name="selectassitencialTango" style="display: block;" >
                                <option v-for="recurs in filteredRecursos(3)" :key="recurs.id" :value="recurs.id" >{{ recurs.codi }}</option>
                            </select>
                            <select class="form-control" id="selecthelicopterMedicalitzat" name="selecthelicopterMedicalitzat" style="display: none;" >
                                <option v-for="recurs in filteredRecursos(4)" :key="recurs.id" :value="recurs.id" >{{ recurs.codi }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3"  style="color: #d53677; font-weight: bold;">Prioritat </label>
                        <div class="col-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioPrioritat" id="prioritat1" value="1" checked>
                                <label class="form-check-label" for="radioPrioritat">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioPrioritat" id="prioritat2" value="2">
                                <label class="form-check-label" for="radioPrioritat">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioPrioritat" id="prioritat3" value="3">
                                <label class="form-check-label" for="radioPrioritat">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioPrioritat" id="prioritat4" value="4">
                                <label class="form-check-label" for="radioPrioritat">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioPrioritat" id="prioritat5" value="5">
                                <label class="form-check-label" for="radioPrioritat">5</label>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center;">
                        <button type="button" v-on:click="addToRecursos" class="btn-primary" style="width: 50%;" >Añadir recurso</button>
                    </div>
                    <table class="table col-12" id="tablaRecursos">
                        <thead>
                            <tr>
                                <th scope="col" style="color: #d53677; font-weight: bold;" ></th>
                                <th scope="col" style="color: #d53677; font-weight: bold;">Codigo del recurso</th>
                                <th scope="col" style="color: #d53677; font-weight: bold;">Tipo de recurso</th>
                                <th scope="col" style="color: #d53677; font-weight: bold;">Prioridad</th>
                                <!-- <th scope="col">Eliminar</th> -->

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-secondary" id="Finalizar" @click="refresh()">Cancelar</button>
            <button type="button" class="btn btn-primary" id="Finalizar" @click="addIncidencia()">Finalizar</button>
        </div>
    </form>
    <audio id="frase1">
          <source src="media/sonido.mp3">
    </audio>
    <audio id="frase2">
          <source src="media/sonido.mp3">
    </audio>
    <audio id="frase3">
          <source src="media/sonido.mp3">
    </audio>
    <audio id="frase4">
          <source src="media/sonido.mp3">
    </audio>
    <audio id="frase5">
          <source src="media/sonido.mp3">
    </audio>
    <audio id="frase6">
          <source src="media/sonido.mp3">
    </audio>
    <audio id="frase7">
          <source src="media/sonido.mp3">
    </audio>

</div>
</template>

<script>
    export default {
        props: {
            afectats: {
                type: Array,
                required: false
            },
            alertants: {
                type: Array,
                required: false
            },
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
            },
            tipusincidencies:{
                type: Array,
                required: false
            },
            recursosToSent:{
                type: Array,
                default: () => []
            },
            afectatToSent:{
                type: Array,
                default: () => []
            }

        },
        data(){
            return {
                incidencia: {
                    id:'',
                    num_incident:"",
                    data:'',
                    telefon_alertant:'',
                    adreca:'',
                    adreca_complement:'',
                    descripcio:'',
                    nom_metge:'',
                    tipus_incidencies_id:'',
                    alertants_id:1,
                    municipis_id:'',
                    usuaris_id:1,
                    idAlertant:'',
                    nomAlertant:'',
                    cognomsAlertant:'',
                    adrecaAlertant:'',
                    municipis_idAlertant:'',
                    tipus_alertants_idAlertant:'',
                    incidencia_has_recursos: this.recursosToSent,
                    incidencia_has_afectats: this.afectatToSent,
                    alertantExist:false,
                },
                sexes_idAfectat:'1',
                ayudaIngles: false,
            }
        },
        mounted() {
            console.log('Component mounted.')
            // document.getElementById('radioMujer').checked = true;
        },
        created(){

        },
        methods: {
            addIncidencia(){
                this.errorMessage = '';
                this.infoMessage = '';
                let me = this;
                axios
                    .post('api/incidencia', me.incidencia)
                    .then(function(response) {

                        console.log(response);
                        //Aqui hay que hacer un redirect
                        // me.addAfectat();
                        location.reload();
                    }).catch(function(error){
                        console.log(error.response.stats);
                        console.log(error.response.data);
                        me.errorMessage = error.response.data.error;
                    })
            },
            addToRecursos(){
                var idRecu = this.returnRecursId();
                var prioritatRecu = this.returnPrioritat()
                var existe = false;

                if(idRecu != null && prioritatRecu != null && idRecu != ""){
                    this.recursosToSent.forEach(element => {
                        if(element.recursos_id == idRecu){
                            existe=true;
                        }
                    });
                    if(!existe){
                        var recurs = {
                            recursos_id: idRecu,
                            prioritat: prioritatRecu
                        }
                        this.recursosToSent.push(recurs);
                        this.anyadirElementoTableR(recurs);

                    }else{
                        alert("Recurso ya añadido");
                    }
                }
            },
            anyadirElementoTableR(recurs){

                var tableR = document.getElementById("tablaRecursos");
                var row1             = tableR.insertRow(1);

                var punto           = row1.insertCell(0)
                var codiRecurso     = row1.insertCell(1)
                var tipoRecurso     = row1.insertCell(2);
                var prioridad       = row1.insertCell(3);
                var btnDelete       = row1.insertCell(4);


                punto.innerHTML = "<div> <p style='margin-bottom: 0px;'>" + "·" + "</p> </div>";

                this.recursos.forEach(recu => {
                    if(recu.id == recurs.recursos_id){
                        codiRecurso.innerHTML = "<div> <p style='margin-bottom: 0px;'>" + recu.codi + "</p> </div>";
                    }
                });

                this.tiporecursos.forEach(tipo => {
                    if(tipo.id == document.getElementById("idTipoRecurso").value){
                        tipoRecurso.innerHTML = "<div> <p style='margin-bottom: 0px;'>" + tipo.tipus + "</p> </div>";
                    }
                });

                prioridad.innerHTML     = "<div> <p style='margin-bottom: 0px;'>" + recurs.prioritat + "</p> </div>";
                //btnDelete.innerHTML     = '<div> <button type="button" class="btn btn-primary" id="btnDelete" @click="eliminarRecurso()">##</button> </div>'
                //btnDelete.innerHTML     = '<div> <button type="button" class="btn btn-primary" id="btnDelete" v-on:click="eliminarRecurso('+ recurs.recursos_id +')">##</button> </div>'
                //btnDelete.innerHTML     = '<div> <button type="button" class="btn btn-primary" id="btnDelete" onclick="eliminarRecurso('+ recurs.recursos_id +')">##</button> </div>'

            },
            // eliminarRecurso(dfgdfg){
            //     var cont = 0;
            //     var pos = null;

            //     this.recursosToSent.forEach( element => {
            //         if (dfgdfg == element.idRecu) {
            //             pos = cont;
            //         }
            //         cont++;
            //     });

            //     recursosToSent.splice(pos,1);
            // },
            addToAfectats() {

                var tel = document.getElementById('telefonAfectat').value;
                var cip = document.getElementById('cip').value;
                var nom = document.getElementById('nomAfectat').value;
                var cognom = document.getElementById('cognomsAfectat').value;
                var edat = document.getElementById('edadAfectat').value;

                var existe = false;
                var existeEnLaBD = false;

                if(tel != "" || cip != "" || nom != "" || cognom != "" || edat != "" || this.sexes_idAfectat != null){

                    if(cip != ""){
                        this.afectatToSent.forEach(element => {
                            if(element.cipAfectat == cip){
                                existe=true;
                            }
                        });
                        if(!existe){
                            this.afectats.forEach(element => {
                                if(element.cip == cip){
                                    existeEnLaBD=true;
                                }
                            });
                        }
                    }

                    if(!existe){
                        var afectat = {
                            telefonAfectat: tel,
                            cipAfectat:     document.getElementById('cip').value,
                            nomAfectat:     document.getElementById('nomAfectat').value,
                            cognomsAfectat: document.getElementById('cognomsAfectat').value,
                            edatAfectat:    document.getElementById('edadAfectat').value,
                            sexes_idAfectat:this.sexes_idAfectat,

                        }

                        if(existeEnLaBD){
                            afectat.afectantExist= true;
                        }else{
                            afectat.afectantExist= false;
                        }

                        this.afectatToSent.push(afectat);
                        this.anyadirElementoTableA(afectat);
                        this.vacaciarCaposAfectado();

                    }else{
                        alert("Afectante ya añadido");
                    }

                }
            },
            anyadirElementoTableA(afectat){

                var tableA = document.getElementById("tablaAfectat");
                var row2 = tableA.insertRow(1);

                var punto           = row2.insertCell(0);
                var nomAfectat      = row2.insertCell(1);
                var cognomsAfectat  = row2.insertCell(2);
                var telefonAfectat  = row2.insertCell(3);
                var cipAfectat      = row2.insertCell(4);
                var sexo            = row2.insertCell(5);
                //var btnDelete       = row.insertCell(6);
                var sexoNom ;

                if(afectat.nomAfectat == ""){
                    afectat.nomAfectat = "---"
                }
                if(afectat.cognomsAfectat == ""){
                    afectat.cognomsAfectat = "---"
                }
                if(afectat.telefonAfectat == ""){
                    afectat.telefonAfectat = "---"
                }
                if(afectat.cipAfectat == ""){
                    afectat.cipAfectat = "---"
                }
                if(afectat.sexes_idAfectat == 1){
                    sexoNom = "Hombre"
                }else{
                    sexoNom = "Mujer"
                }


                punto.innerHTML             = "<div> <p style='margin-bottom: 0px;'>" + "·" + "</p> </div>";
                nomAfectat.innerHTML        = "<div> <p style='margin-bottom: 0px;'>" + afectat.nomAfectat + "</p> </div>";
                cognomsAfectat.innerHTML    = "<div> <p style='margin-bottom: 0px;'>" + afectat.cognomsAfectat + "</p> </div>";
                telefonAfectat.innerHTML    = "<div> <p style='margin-bottom: 0px;'>" + afectat.telefonAfectat + "</p> </div>";
                cipAfectat.innerHTML        = "<div> <p style='margin-bottom: 0px;'>" + afectat.cipAfectat + "</p> </div>";
                sexo.innerHTML              = "<div> <p style='margin-bottom: 0px;'>" + sexoNom + "</p> </div>";
                //btnDelete.innerHTML     = '<div> <button type="button" class="btn btn-primary" id="btnDelete" @click="eliminarRecurso()">##</button> </div>'
                //btnDelete.innerHTML     = '<div> <button type="button" class="btn btn-primary" id="btnDelete" v-on:click="eliminarRecurso('+ recurs.recursos_id +')">##</button> </div>'
                //btnDelete.innerHTML     = '<div> <button type="button" class="btn btn-primary" id="btnDelete" onclick="eliminarRecurso('+ recurs.recursos_id +')">##</button> </div>'

            },
            vacaciarCaposAfectado(){

                document.getElementById('telefonAfectat').value = "";
                document.getElementById('cip').value = "";
                document.getElementById('nomAfectat').value = "";
                document.getElementById('cognomsAfectat').value = "";
                document.getElementById('edadAfectat').value = "";

            },
            returnRecursId(){
                var medicalitzadaMike = document.getElementById('selectMedicalitzadaMike');
                var sanitaritzadaIndia = document.getElementById('selectsanitaritzadaIndia');
                var assitencialTango = document.getElementById('selectassitencialTango');
                var helicopterMedicalitzat = document.getElementById('selecthelicopterMedicalitzat');

                var id;
                if (medicalitzadaMike.style.display == 'block'){
                    id = medicalitzadaMike.value;
                }
                if (sanitaritzadaIndia.style.display == 'block'){
                    id = sanitaritzadaIndia.value;
                }
                if (assitencialTango.style.display == 'block'){
                    id = assitencialTango.value;
                }
                if (helicopterMedicalitzat.style.display == 'block'){
                    id = helicopterMedicalitzat.value;
                }

                return id;
            },
            returnPrioritat(){
                var radio1 = document.getElementById('prioritat1');
                var radio2 = document.getElementById('prioritat2');
                var radio3 = document.getElementById('prioritat3');
                var radio4 = document.getElementById('prioritat4');
                var radio5 = document.getElementById('prioritat5');
                var priority;
                if (radio1.checked) {
                    priority = 1;
                }
                if (radio2.checked) {
                    priority = 2;
                }
                if (radio3.checked) {
                    priority = 3;
                }
                if (radio4.checked) {
                    priority = 4;
                }
                if (radio5.checked) {
                    priority = 5;
                }

                return priority;
            },
            filteredRecursos(id){
                var recursosToReturn = [];

                this.recursos.forEach(element => {
                        if (element.tipus_recursos_id == id){
                            recursosToReturn.push(element);
                        }
                    }
                );

                return recursosToReturn;
            },
            onChange(event) {
                var medicalitzadaMike = document.getElementById('selectMedicalitzadaMike');
                var sanitaritzadaIndia = document.getElementById('selectsanitaritzadaIndia');
                var assitencialTango = document.getElementById('selectassitencialTango');
                var helicopterMedicalitzat = document.getElementById('selecthelicopterMedicalitzat');
                if (event.target.value == 1){
                    medicalitzadaMike.style.display = "block";
                    sanitaritzadaIndia.style.display = "none";
                    assitencialTango.style.display = "none";
                    helicopterMedicalitzat.style.display = "none";
                } else if (event.target.value == 2){
                    medicalitzadaMike.style.display = "none";
                    sanitaritzadaIndia.style.display = "block";
                    assitencialTango.style.display = "none";
                    helicopterMedicalitzat.style.display = "none";
                } else if (event.target.value == 3){
                    medicalitzadaMike.style.display = "none";
                    sanitaritzadaIndia.style.display = "none";
                    assitencialTango.style.display = "block";
                    helicopterMedicalitzat.style.display = "none";
                } else {
                    medicalitzadaMike.style.display = "none";
                    sanitaritzadaIndia.style.display = "none";
                    assitencialTango.style.display = "none";
                    helicopterMedicalitzat.style.display = "block";
                }
            },
            audioClick(idAudio){
                var frase = document.getElementById(idAudio);

                frase.currentTime = 0;
                frase.play();
                frase.volume = 0.20;
            },
            showHelp(){
                var labels = document.querySelectorAll('.labelIngles');
                if(this.ayudaIngles == false){
                    for(let i = 0; i < labels.length; i++){
                        let label =labels[i];
                        label.style.display="block";
                    }

                    this.ayudaIngles = true;
                }
                else {
                    for(let i = 0; i < labels.length; i++){
                        let label =labels[i];
                        label.style.display="none";
                    }

                    this.ayudaIngles = false;
                }

            
            },
            busacarAlertante(){

                var busqueda = false;

                var telefonAlertant = document.getElementById('telefonAlertant').value;

                var nomAlertant = document.getElementById('nomAlertant');
                var cognomsAlertant = document.getElementById('cognomsAlertant');
                var adrecaAlertant = document.getElementById('adrecaAlertant');
                var municipis_id_Alertant = document.getElementById('municipis_id_Alertant');
                var tipus_alertants_id = document.getElementById('tipus_alertants_id');


                this.alertants.forEach(alertant => {

                    if(alertant.telefon == telefonAlertant){

                        this.incidencia.telefon_alertant            =alertant.telefon
                        this.incidencia.nomAlertant                 =alertant.nom;
                        this.incidencia.cognomsAlertant             =alertant.cognoms;
                        this.incidencia.adrecaAlertant              =alertant.adreca;
                        this.incidencia.municipis_idAlertant        =alertant.municipis_id;
                        this.incidencia.tipus_alertants_idAlertant  =alertant.tipus_alertants_id;


                        nomAlertant.disabled            = true;
                        cognomsAlertant.disabled        = true;
                        adrecaAlertant.disabled         = true;
                        municipis_id_Alertant.disabled  = true;
                        tipus_alertants_id.disabled     = true;
                        busqueda                        = true;
                        this.incidencia.alertantExist   = true;
                        this.incidencia.idAlertant      = alertant.id;

                    }
                });
                if(!busqueda){
                    tipus_alertants_id.disabled = false;
                    municipis_id_Alertant.disabled = false;
                    adrecaAlertant.disabled = false;
                    cognomsAlertant.disabled = false;
                    nomAlertant.disabled = false;
                    busqueda=false;
                    this.incidencia.alertantExist = false;
                }

            },
            refresh(){
                location.reload();
            }

        }
    }



</script>
