<template>


<div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
        <div class="card-header" id="info">Gestion incidencia 4564 en recurso mobil 45645</div>
        <div class="card-body">
            <form>
                <fieldset>
                    <div class="form-group row">
                        <label for="HoraActivacion" class="col-4 col-form-label">Hora activacion</label>
                        <input class="col-6" id="HoraActivacion" type="time" name="HoraActivacion" step="2" style="text-align: center" disabled>
                    </div>

                    <div class="form-group row">
                        <label for="HoraMovilizacion" class="col-4 col-form-label">Hora movilizacion</label>
                        <input class="col-5" id="HoraMovilizacion" type="time" name="HoraMovilizacion" step="2" style="text-align: center">
                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                            <img src="public\img\loop.png" alt="reset" width="100%" height="100%" onclick="myFunction('HoraMovilizacion')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="HoraAsistencia" class="col-4 col-form-label">Hora asistencia</label>
                        <input class="col-5" id="HoraAsistencia" type="time" name="HoraAsistencia" step="2" style="text-align: center">
                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                            <img src="public\img\loop.png" alt="reset" width="100%" height="100%" onclick="myFunction('HoraAsistencia')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="DestinoHospital" class="col-4 col-form-label">Destino hospital</label>
                        <select class="form-control col-6" id="recurso">
                            <option v-for="hospital in hospitales" :key="hospital.id" :value="hospital.id" >{{ hospital.nom }}</option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="HoraInicioTranporte" class="col-4 col-form-label">Hora inicio tranporte</label>
                        <input class="col-5" id="HoraInicioTranporte" type="time" name="HoraInicioTranporte" step="2" style="text-align: center">
                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                            <img src="public\img\loop.png" alt="reset" width="100%" height="100%" onclick="myFunction('HoraInicioTranporte')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="HoraLlegadaHospital" class="col-4 col-form-label">Hora llegada al hospital</label>
                        <input class="col-5" id="HoraLlegadaHospital" type="time" name="HoraLlegadaHospital" step="2" style="text-align: center">
                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                            <img src="public\img\loop.png" alt="reset" width="100%" height="100%" onclick="myFunction('HoraLlegadaHospital')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="HoraTransferencia" class="col-4 col-form-label">Hora transferencia</label>
                        <input class="col-5" id="HoraTransferencia" type="time" name="HoraTransferencia" step="2" style="text-align: center">
                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                            <img src="public\img\loop.png" alt="reset" width="100%" height="100%" onclick="myFunction('HoraTransferencia')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="HoraFinalizacion" class="col-4 col-form-label">Hora finalizacion</label>
                        <input class="col-5" id="HoraFinalizacion" type="time" name="HoraFinalizacion" step="2" style="text-align: center">
                        <div style="height:35px; width:35px; margin-left: 20px; cursor: pointer;">
                            <img src="public\img\loop.png" alt="reset" width="100%" height="100%" onclick="myFunction('HoraFinalizacion')">
                        </div>
                    </div>


                    <div class="text-right">
                        <button type="button" class="btn btn-danger" id="cancelar">Atras</button>
                        <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
                    </div>

                </fieldset>
            </form>
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

                incidencias: [],
                hospitales: [],

                userLogued:{
                    id: 1,
                    username: 'Pepe',
                    contrasenya: 'aaaaaaaaaa',
                    email: 'aaaaaaaaaaaa@aaaaa.com',
                    nom:'PEPE' ,
                    cognoms: 'AAAAA',
                    rols_id: 3,
                    recursos_id: 2

                }



            }
        },
        mounted() {
            console.log('Component mounted.');

        },
        created(){



            let me = this;
            axios
                    .get('api/incidencia')
                    .then(response =>{

                        me.incidencias = response.data;


                        this.alertantes.forEach(alertante => {
                            if (alertante.tipus_alertants_id == 1) {
                                this.hospitales.push(alertante);
                            }
                        });

                        me.incidencias.forEach(element => {



                        if (element.incidencia_has_recursos[0].recursos_id == this.userLogued.recursos_id && element.incidencia_has_recursos[0].hora_finalitzacio == null) {
                            var HoraActivacion = document.getElementById("HoraActivacion");
                            HoraActivacion.value = element.incidencia_has_recursos[0].hora_activacio;


                        }else{

                            // if (flag == false) {
                            //     var pantalla = document.getElementById('global');
                            //     pantalla.style.display = "none";
                            // }


                        }

                });



                    })
                    .catch(error =>{
                        console.log(error)
                    })
                    .finally(() => this.loading = false)




        },
        methods: {
            selectTipusRecursos() {

            },
            selectRecursos(){


            }

        }

    }




</script>
