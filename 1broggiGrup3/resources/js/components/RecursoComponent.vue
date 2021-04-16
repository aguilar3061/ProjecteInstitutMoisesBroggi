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
        <div class="card-header">Info incidencia</div>
        <div class="card-body">

            <div class="form-group row">
                <label class="col-4 col-form-label">Alertante</label>
                <label class="col-5 col-form-label" id="alertante">  </label>
            </div>
            <div class="form-group row">
                <label class="col-4 col-form-label">Telefono alertante</label>
                <label class="col-5 col-form-label" id="telefono">  </label>
            </div>
            <div class="form-group row">
                <label class="col-4 col-form-label">Municipio</label>
                <label class="col-5 col-form-label" id="municipio">  </label>
            </div>
            <div class="form-group row">
                <label class="col-4 col-form-label">Direccion</label>
                <label class="col-5 col-form-label" id="direccion">  </label>
            </div>
            <div class="form-group row">
                <label class="col-4 col-form-label">Direccion completa</label>
                <label class="col-5 col-form-label" id="dirCompleta">  </label>
            </div>
            <!-- <div class="form-group row">
                <label class="col-4 col-form-label">Titulo incidencia</label>
                <label class="col-5 col-form-label"> Incendio en edificio B </label>
            </div> -->
            <div class="form-group row">
                <label class="col-4 col-form-label">Descripción</label>
                <label class="col-5 col-form-label" id="desc">

                </label>
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

                incidencias: [],


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

                        var flag = false;

                        me.incidencias.forEach(element => {



                        if (element.incidencia_has_recursos[0].recursos_id == this.userLogued.recursos_id && element.incidencia_has_recursos[0].hora_finalitzacio == null) {

                            var alertante = document.getElementById('alertante');
                            var telefono = document.getElementById('telefono');
                            var municipio = document.getElementById('municipio');
                            var direccion = document.getElementById('direccion');
                            var direccionCompleta = document.getElementById('dirCompleta');
                            var descripcion = document.getElementById('desc');

                            // var titulo_info_recurso = document.getElementById('titulo_info_recurso');
                            // var info_recurso = document.getElementById('info_recurso');

                            // this.recurso.forEach(miRecurso => {
                            //     if (miRecurso.id == this.userLogued.recursos_id) {
                            //         recursoLogued = miRecurso;
                            //         titulo_info_recurso.innerHTML = "Info recurso " + miRecurso.codi;

                            //     }
                            // });

                            // this.tipo_recurso.forEach(rec => {
                            //     if (rec.id == recursoLogued.tipus_recursos_id) {
                            //         info_recurso.innerHTML = rec.tipus;

                            //     }
                            // });



                            var municipioNom;
                            var alertanteNom;

                            this.municipios.forEach(element1 => {
                                if (element1.id == element.municipis_id) {
                                    municipioNom = element1.nom;
                                }
                            });

                            this.alertantes.forEach(element2 => {
                                if (element2.id == element.alertants_id) {
                                    alertanteNom = element2.nom;
                                }
                            });


                            alertante.innerHTML = alertanteNom;
                            telefono.innerHTML = element.telefon_alertant;
                            municipio.innerHTML = municipioNom;
                            direccion.innerHTML = element.adreca;
                            direccionCompleta.innerHTML = element.adreca_complement;
                            descripcion.innerHTML = element.descripcio;

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
            selectTipusRecursos() {

            },
            selectRecursos(){


            }

        }

    }




</script>
