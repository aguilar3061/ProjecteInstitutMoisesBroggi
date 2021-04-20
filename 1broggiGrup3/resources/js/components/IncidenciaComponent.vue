<template>
<div class="border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%; margin-bottom: 5%;">
    <form>
        <div class="card-header">Incidencia</div>
        <div class="btn-group-toggle mt-2 ml-4" data-toggle="buttons">
            <label class="btn btn-info active">
                <input type="checkbox" checked autocomplete="off"  @click="showHelp()"> Ayuda Ingles
            </label>
        </div>
        <div class="card-body">
            <div class="card mt-2">
                <div class="card-header">Alertant</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="telefonAlertant" class="col-3 col-form-label">Telefono</label>
                        <div class="col-9">
                            <input class="form-control" type="number" id="telefonAlertant" name="telefonAlertant" v-model="incidencia.telefon_alertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomAlertant" class="col-3 col-form-label">Nombre</label>
                        <div class="form-group col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">What's your name ? <img src="img/speaker.png" @click="audioClick('frase1')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text"  id="nomAlertant" name="nomAlertant" v-model="incidencia.nomAlertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cognomsAlertant" class="col-3 col-form-label">Apellidos</label>
                        <div class="col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">What's your surname ? <img src="img/speaker.png" @click="audioClick('frase2')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text" id="cognomsAlertant" name="cognomsAlertant" v-model="incidencia.cognomsAlertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adrecaAlertant" class="col-3 col-form-label">Dirección</label>
                        <div class="col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">Where are you now ?  <img src="img/speaker.png" @click="audioClick('frase3')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text" id="adrecaAlertant" name="adrecaAlertant" v-model="incidencia.adrecaAlertant">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="municipis_id_Alertant" class="col-3 col-form-label">Municipio</label>
                        <div class="col-9">
                            <select class="form-control" id="municipis_id_Alertant" name="municipis_id_Alertant" v-model="incidencia.municipis_idAlertant">
                                <option v-for="municipis_idAlertant in municipios" :key="municipis_idAlertant.id" :value="municipis_idAlertant.id" >{{ municipis_idAlertant.nom }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipus_alertants_id" class="col-3 col-form-label">Tipus alertant</label>
                        <div class="col-9">
                            <select class="form-control" id="tipus_alertants_id" name="tipus_alertants_id" v-model="incidencia.tipus_alertants_idAlertant">
                                <option v-for="tipus_alertants_idAlertant in tipusalertants" :key="tipus_alertants_idAlertant.id" :value="tipus_alertants_idAlertant.id" >{{ tipus_alertants_idAlertant.tipus }}</option>
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
                            <input class="form-control" type="number" id="telefonAfectat" name="telefonAfectat" v-model="afectat.telefonAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cip" class="col-3 col-form-label">Documento (DNI, TS/NSS)</label>
                        <div class="col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">Can you tell me an identification number of the victim ?  <img src="img/speaker.png" @click="audioClick('frase4')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text" id="cip" name="cip" v-model="afectat.cipAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomAfectat" class="col-3 col-form-label">Nombre</label>
                        <div class="col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">Can you tell me the name of the victim ?  <img src="img/speaker.png" @click="audioClick('frase5')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text"  id="nomAfectat" name="nomAfectat" v-model="afectat.nomAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cognomsAfectat" class="col-3 col-form-label">Apellidos</label>
                        <div class="col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">Can you tell me the surname of the victim ?  <img src="img/speaker.png" @click="audioClick('frase6')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <input class="form-control" type="text" id="cognomsAfectat" name="cognomsAfectat" v-model="afectat.cognomsAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edadAfectat" class="col-3 col-form-label">Edad</label>
                        <div class="col-9">
                            <input class="form-control" type="number" id="edadAfectat" name="edadAfectat" v-model="afectat.edatAfectat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Sexo: </label>
                        <div class="col-9">
                            <label for="telefonAlertant" class="col-6 col-form-label labelIngles" style="display: none; font-style: italic;">Can you tell me the sex of the victim ?  <img src="img/speaker.png" @click="audioClick('frase7')" alt="Escuchar frase" width="25px" height="25px"></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexes_id" id="radioMujer" value="2" v-model="afectat.sexes_idAfectat">
                                <label class="form-check-label" for="sexes_id">Mujer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexes_id" id="radioHombre" value="1" v-model="afectat.sexes_idAfectat">
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
                            <input class="form-control" type="datetime-local"  id="fechaHora" name="fechaHora" v-model="incidencia.data">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="adreca" class="col-3 col-form-label">Dirección</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="adreca" name="adreca"  v-model="incidencia.adreca">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adreca_complement" class="col-3 col-form-label">Complemento dirección</label>
                        <div class="col-9">
                            <input class="form-control" type="text" id="adreca_complement" name="adreca_complement"  v-model="incidencia.adreca_complement">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcio" class="col-3 col-form-label">Descripción</label>
                        <div class="col-9">
                            <textarea class="form-control" id="descripcio" rows="3" name="descripcio"  v-model="incidencia.descripcio"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nom_metge" class="col-3 col-form-label">Nombre médico</label>
                        <div class="col-9">
                            <input class="form-control" type="text"  id="nom_metge" name="nom_metge" v-model="incidencia.nom_metge">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tipus_incidencia_id" class="col-3 col-form-label">Tipus Incidencia</label>
                        <div class="col-9">
                            <select class="form-control" id="tipus_incidencia_id" name="tipus_incidencia_id" v-model="incidencia.tipus_incidencies_id">
                                <option v-for="tipus_incidencies_id in tipusincidencies" :key="tipus_incidencies_id.id" :value="tipus_incidencies_id.id">{{ tipus_incidencies_id.tipus }}</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="municipis_id_Alertant" class="col-3 col-form-label">Municipio</label>
                        <div class="col-9">
                            <select class="form-control" id="municipis_id_Alertant" name="municipis_id_Alertant" v-model="incidencia.municipis_id">
                                <option v-for="municipio in municipios" :key="municipio.id" :value="municipio.id" >{{ municipio.nom }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header">Recursos</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="idTipoRecurso" class="col-3 col-form-label">Tipus de recurso</label>
                        <div class="col-9">
                            <select class="form-control" id="idTipoRecurso" name="idTipoRecurso" @change="onChange($event)" >
                                <option v-for="tipusrecurs in tiporecursos" :key="tipusrecurs.id" :value="tipusrecurs.id" >{{ tipusrecurs.tipus }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recursos_id" class="col-3 col-form-label">Recurso</label>
                        <div class="col-9">
                            <select class="form-control" id="selectMedicalitzadaMike" name="selectMedicalitzadaMike" style="display: none;" >
                                <option v-for="recurs in filteredRecursos(1)" :key="recurs.id" :value="recurs.id" >{{ recurs.codi }}</option>
                            </select>
                            <select class="form-control" id="selectsanitaritzadaIndia" name="selectsanitaritzadaIndia" style="display: none;" >
                                <option v-for="recurs in filteredRecursos(2)" :key="recurs.id" :value="recurs.id" >{{ recurs.codi }}</option>
                            </select>
                            <select class="form-control" id="selectassitencialTango" name="selectassitencialTango" >
                                <option v-for="recurs in filteredRecursos(3)" :key="recurs.id" :value="recurs.id" >{{ recurs.codi }}</option>
                            </select>
                            <select class="form-control" id="selecthelicopterMedicalitzat" name="selecthelicopterMedicalitzat" style="display: none;" >
                                <option v-for="recurs in filteredRecursos(4)" :key="recurs.id" :value="recurs.id" >{{ recurs.codi }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Prioritat: </label>
                        <div class="col-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioPrioritat" id="prioritat1" value="1">
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
                        <button type="button" v-on:click="addToRecursos"  class="btn btn-primary" >Añadir recurso</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-secondary" id="Finalizar">Cancelar</button>
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
            }
        },
        data(){
            return {
                incidencia: {
                    id:'',
                    num_incident:99,
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
                    incidencia_has_recursos: this.recursosToSent
                },
                afectat:{
                    idAfectat:'',
                    telefonAfectat:'',
                    cipAfectat:'',
                    nomAfectat:'',
                    cognomsAfectat:'',
                    edatAfectat:'',
                    sexes_idAfectat:'',
                },
                 ayudaIngles: false,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){

        },
        methods: {
            addAfectat(){
                this.errorMessage = '';
                this.infoMessage = '';
                let me = this;
                axios
                    .post('api/afectats', me.afectat)
                    .then(function(response) {
                        console.log(response);
                        //Aqui hay que hacer un redirect
                    }).catch(function(error){
                        console.log(error.response.stats);
                        console.log(error.response.data);
                        me.errorMessage = error.response.data.error;
                    })

            },
            addIncidencia(){
                this.errorMessage = '';
                this.infoMessage = '';
                let me = this;
                axios
                    .post('api/incidencia', me.incidencia)
                    .then(function(response) {
                        console.log(response);
                        //Aqui hay que hacer un redirect
                        me.addAfectat();
                    }).catch(function(error){
                        console.log(error.response.stats);
                        console.log(error.response.data);
                        me.errorMessage = error.response.data.error;
                    })
            },
            addToRecursos() {

                var recurs = {
                    recursos_id: this.returnRecursId(),
                    prioritat: this.returnPrioritat()
                }


                this.recursosToSent.push(recurs);
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
                });

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

            }
        }
    }

</script>
