<template>
<div id="global">

<div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;" >
        <div class="card-header" ><p id="titulo_info_recurso">Info recurso </p></div>
        <div class="card-body">
        <p id="info_recurso">
            Info
        </p>

        </div>
</div>
    <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%; ">
        <div class="card-header" id="infoIncidencia">Info incidencia</div>
        <div class="card-body">


            <div class="input-group mb-3">
                <span class="input-group-text col-lg-2 col-sm-4" id="inputGroup-sizing-default">Alertante</span>
                <input type="text" class="form-control" id="alertante" disabled style="text-align: center;">

            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-lg-2 col-sm-4" id="inputGroup-sizing-default">Telefono alertante</span>
                <input type="text" class="form-control" id="telefono" disabled style="text-align: center;">

            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-lg-2 col-sm-4" id="inputGroup-sizing-default">Municipio</span>
                <input type="text" class="form-control" id="municipio" disabled style="text-align: center;">

            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-lg-2 col-sm-4" id="inputGroup-sizing-default">Direccion</span>
                <input type="text" class="form-control" id="direccion" disabled style="text-align: center;">

            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-lg-2 col-sm-4" id="inputGroup-sizing-default">Direccion completa</span>
                <input type="text" class="form-control" id="dirCompleta" disabled style="text-align: center;">

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text col-lg-2 col-sm-4">Descripción</span>
                <textarea class="form-control" aria-label="With textarea" id="desc" disabled></textarea>
            </div>


            <button type="button" class="btn btn-primary col-12" id="guardar" @click="formRecurso()">Gestionar incidencia</button>

            <!-- Modal update -->
            <div class="modal" tabindex="-1" id="updateModal">
                <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
                    <div class="card-header" id="infoGestionIncidencia"></div>
                        <div class="card-body">
                            <form>
                                <fieldset>
                                    <div class="form-group row">
                                        <label for="HoraActivacion" class="col-4 col-form-label">Hora activacion</label>
                                        <input class="col-5" id="HoraActivacion" type="time" name="HoraActivacion" step="2" style="text-align: center" disabled>
                                    </div>

                                    <div class="form-group row">
                                        <label for="HoraMovilizacion" class="col-4 col-form-label">Hora movilizacion</label>
                                        <input class="col-5" v-model="HoraMovilizacion" id="HoraMovilizacion" type="time" name="HoraMovilizacion" step="2" style="text-align: center">
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\loop.png" alt="reset" width="100%" height="100%" @click="selectHoraMovilizacion()">
                                        </div>
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\remove.png" alt="reset" width="100%" height="100%" @click="removeHoraMovilizacion()">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="HoraAsistencia" class="col-4 col-form-label">Hora asistencia</label>
                                        <input class="col-5" id="HoraAsistencia" v-model="HoraAsistencia" type="time" name="HoraAsistencia" step="2" style="text-align: center">
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\loop.png" alt="reset" width="100%" height="100%" @click="selectHoraAsistencia()">
                                        </div>
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\remove.png" alt="reset" width="100%" height="100%" @click="removeHoraAsistencia()">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="DestinoHospital" class="col-4 col-form-label">Destino hospital</label>

                                        <select class="form-control col-5" v-model="Hospital" id="hospital">
                                            <option value="">Seleccionar hospital</option>
                                            <option v-for="hospital in hospitales" :key="hospital.id" :value="hospital.id" >{{ hospital.nom }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label for="HoraInicioTranporte" class="col-4 col-form-label">Hora inicio tranporte</label>
                                        <input class="col-5" id="HoraInicioTranporte" v-model="HoraInicioTranporte" type="time" name="HoraInicioTranporte" step="2" style="text-align: center">
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\loop.png" alt="reset" width="100%" height="100%" @click="selectHoraInicioTranporte()">
                                        </div>
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\remove.png" alt="reset" width="100%" height="100%" @click="removeHoraInicioTranporte()">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="HoraLlegadaHospital" class="col-4 col-form-label">Hora llegada al hospital</label>
                                        <input class="col-5" id="HoraLlegadaHospital" v-model="HoraLlegadaHospital" type="time" name="HoraLlegadaHospital" step="2" style="text-align: center">
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\loop.png" alt="reset" width="100%" height="100%" @click="selectHoraLlegadaHospital()">
                                        </div>
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\remove.png" alt="reset" width="100%" height="100%" @click="removeHoraLlegadaHospital()">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="HoraTransferencia" class="col-4 col-form-label">Hora transferencia</label>
                                        <input class="col-5" id="HoraTransferencia" v-model="HoraTransferencia" type="time" name="HoraTransferencia" step="2" style="text-align: center">
                                       <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\loop.png" alt="reset" width="100%" height="100%" @click="selectHoraTransferencia()">
                                        </div>
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\remove.png" alt="reset" width="100%" height="100%" @click="removeHoraTransferencia()">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="HoraFinalizacion" class="col-4 col-form-label">Hora finalizacion</label>
                                        <input class="col-5" id="HoraFinalizacion" v-model="HoraFinalizacion" type="time" name="HoraFinalizacion" step="2" style="text-align: center">
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\loop.png" alt="reset" width="100%" height="100%" @click="selectHoraFinalizacion()">
                                        </div>
                                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                                            <img src="img\remove.png" alt="reset" width="100%" height="100%" @click="removeHoraFinalizacion()">
                                        </div>
                                    </div>


                                    <div class="text-right">
                                        <button type="button" class="btn btn-danger" id="cancelar" @click="cerrarModal()">Atras</button>
                                        <button type="button" class="btn btn-primary" id="guardar" @click="update()">Guardar</button>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                </div>
            </div>



        </div>
    </div>

</div>


</template>

<script>

    export default {
        props:{
            recurso:{
                type:Array,
                required:false
            },
            municipios:{
                type:Array,
                required:false
            },
            alertantes:{
                type:Array,
                required:false
            },
            tipo_recurso:{
                type:Array,
                required:false
            }
        },
        data() {
            return{

                incidencias_has_recursos: [],
                hospitales: [],
                miIncidencia_has_recurso: [] ,
                recursoLogued: [],

                userLogued:{
                    id: 1,
                    username: 'Pepe',
                    contrasenya: 'aaaaaaaaaa',
                    email: 'aaaaaaaaaaaa@aaaaa.com',
                    nom:'PEPE' ,
                    cognoms: 'AAAAA',
                    rols_id: 3,
                    recursos_id: 2

                },

                HoraMovilizacion: '',
                HoraAsistencia: '',
                HoraInicioTranporte: '',
                HoraLlegadaHospital: '',
                HoraTransferencia: '',
                HoraFinalizacion: '',
                Hospital: ''




            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        created(){



            let me = this;
            axios
                    .get('api/recurs')
                    .then(response =>{

                        me.incidencias_has_recursos = response.data;

                        var flag = false;

                        me.incidencias_has_recursos.forEach(element => {



                        if (element.recursos_id == this.userLogued.recursos_id && element.hora_finalitzacio == null) {



                            me.miIncidencia_has_recurso = element;
                            var alertante = document.getElementById('alertante');
                            var telefono = document.getElementById('telefono');
                            var municipio = document.getElementById('municipio');
                            var direccion = document.getElementById('direccion');
                            var direccionCompleta = document.getElementById('dirCompleta');
                            var descripcion = document.getElementById('desc');
                            var infoIncidencia = document.getElementById('infoIncidencia');
                            var titulo_info_recurso = document.getElementById('titulo_info_recurso');
                            var info_recurso = document.getElementById('info_recurso');



                            this.recurso.forEach(miRecurso => {
                                if (miRecurso.id == this.userLogued.recursos_id) {
                                    this.recursoLogued = miRecurso;
                                    titulo_info_recurso.innerHTML = "Info recurso " + miRecurso.codi;

                                }
                            });

                            this.tipo_recurso.forEach(rec => {
                                if (rec.id == this.recursoLogued.tipus_recursos_id) {
                                    info_recurso.innerHTML = rec.tipus;

                                }
                            });



                            var municipioNom;
                            var alertanteNom;

                            this.municipios.forEach(element1 => {
                                if (element1.id == element.incidencia.municipis_id) {
                                    municipioNom = element1.nom;
                                }
                            });

                            this.alertantes.forEach(element2 => {
                                if (element2.id == element.incidencia.alertants_id) {
                                    alertanteNom = element2.nom;
                                }
                            });


                            alertante.value = alertanteNom;
                            telefono.value = element.incidencia.telefon_alertant;
                            municipio.value = municipioNom;
                            direccion.value = element.incidencia.adreca;
                            direccionCompleta.value = element.incidencia.adreca_complement;
                            descripcion.value = element.incidencia.descripcio;
                            infoIncidencia.value = "Info incidencia número: " + element.incidencia.num_incident;




                            flag = true;

                        }else{

                            if (flag == false) {
                                var pantalla = document.getElementById('global');
                                pantalla.style.display = "none";
                            }


                        }

                });

                    })
                    .catch(error =>{
                        console.log(error)
                    })
                    .finally(() => this.loading = false)




        },
        methods: {
            formRecurso: function(){

                $('#updateModal').modal('show');

                this.alertantes.forEach(alertante => {
                            if (alertante.tipus_alertants_id == 1) {
                                this.hospitales.push(alertante);
                            }
                        });

                var HoraActivacion = document.getElementById("HoraActivacion");
                HoraActivacion.value = this.miIncidencia_has_recurso.hora_activacio;

                var infoGestionIncidencia = document.getElementById("infoGestionIncidencia");
                infoGestionIncidencia.innerHTML = "Gestion incidencia " + this.miIncidencia_has_recurso.num_incident +
                 " en recurso mobil " +  this.recursoLogued.codi

            },
            cerrarModal: function(){

                $('#updateModal').modal('hide');

            },
            selectHoraMovilizacion(){

                var d = new Date();
                var t = d.toLocaleTimeString();

                this.HoraMovilizacion = t;


            },

            selectHoraAsistencia(){
                var d = new Date();
                var t = d.toLocaleTimeString();

                this.HoraAsistencia = t;

            },

            selectHoraInicioTranporte(){
                var d = new Date();
                var t = d.toLocaleTimeString();

                this.HoraInicioTranporte = t;
            },

            selectHoraLlegadaHospital(){

                var d = new Date();
                var t = d.toLocaleTimeString();

                this.HoraLlegadaHospital = t;
            },

            selectHoraTransferencia(){

                var d = new Date();
                var t = d.toLocaleTimeString();

                this.HoraTransferencia = t;
            },

            selectHoraFinalizacion(){
                var d = new Date();
                var t = d.toLocaleTimeString();

                this.HoraFinalizacion = t;

            },
            removetHoraMovilizacion(){



                this.HoraMovilizacion = null;


            },

            removeHoraAsistencia(){


                this.HoraAsistencia = null;

            },

            removeHoraInicioTranporte(){


                this.HoraInicioTranporte = null;
            },

            removeHoraLlegadaHospital(){



                this.HoraLlegadaHospital = null;
            },

            removeHoraTransferencia(){



                this.HoraTransferencia = null;
            },

            removeHoraFinalizacion(){


                this.HoraFinalizacion = null;

            },
            update(){

                this.miIncidencia_has_recurso.hora_mobilitzacio = this.HoraMovilizacion;
                this.miIncidencia_has_recurso.hora_assistencia = this.HoraAsistencia;
                this.miIncidencia_has_recurso.hora_transport = this.HoraInicioTranporte;
                this.miIncidencia_has_recurso.hora_arribada_hospital = this.HoraLlegadaHospital;
                this.miIncidencia_has_recurso.hora_transferencia = this.HoraTransferencia;
                this.miIncidencia_has_recurso.hora_finalitzacio = this.HoraFinalizacion;
                this.miIncidencia_has_recurso.desti = this.Hospital;

                this.errorMessage = '';
                this.infoMessage = '';
                let me = this;



                axios
                    .put('api/recurs/' +  me.incidencias_has_recursos.incidencies_id, me.miIncidencia_has_recurso)
                    .then(function(response) {
                        console.log(response);
                    }).catch(function(error){
                        console.log(error.response.stats);
                        console.log(error.response.data);
                        me.errorMessage = error.response.data.error;
                    })
                $('#updateModal').modal('hide');
            }






        }

    }




</script>
