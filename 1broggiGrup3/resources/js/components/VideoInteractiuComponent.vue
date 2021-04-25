<template>
<div>
    <div class="card border-primary mb-3" style="margin-top: 2%; margin-right: 5%; margin-left: 5%;">
        <div class="card-header" id="info">Videos interactius</div>
        <div class="card-body">
            <div class="card mb-3" >
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="img\clip1Miniatura.png" class="card-img" >
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">CLIP 1</h5>
                            <p class="card-text">Aquí encontrarás un video donde se explica el procedimiento RCP completo</p>
                            <button type="button" class="btn btn-info" @click="openVideoModal(1)">Muestra</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" >
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="img\clip2Miniatura.png" class="card-img" >
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">CLIP 2</h5>
                            <p class="card-text">Aquí encontrarás un video donde se explica el procedimiento DESA</p>
                            <button type="button" class="btn btn-info" @click="openVideoModal(2)">Muestra</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="img\clip3Miniatura.png" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">CLIP 3</h5>
                            <p class="card-text">Aquí encontrarás un video donde se muestra la secuenciá RCP</p>
                            <button type="button" class="btn btn-info" @click="openVideoModal(3)">Muestra</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!--Modal VIDEO-->
    <div class="modal" tabindex="-1" role="dialog" id="videoModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">VIDEO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video ref="videoRef" v-bind:src="video" id="video-container" width="100%" controls></video>
                    </div>
                    <form id="form" style="display: none;">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pregunta</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="pregunta" :value="quiz.pregunta">
                            </div>
                        </div>
                        <div class="form-check" v-for="respuesta in quiz.respuestas" :key="respuesta.id">
                            <input class="form-check-input" type="radio" name="Radios" v-bind:id="respuesta.name"  :value="respuesta.true">
                            <label class="form-check-label" v-bind:for="respuesta.name">
                                {{ respuesta.resp }}
                            </label>
                        </div>
                        <button type="button" class="btn btn-success" @click="respuesta()">Responder</button>
                        <button type="button" class="btn btn-danger" @click="noRespuesta()">No lo sé </button>
                    </form>
                    <div class="alert alert-success" role="alert" id="respuestaCorrect" style="display: none;">
                        Respuesta correcta!!!
                    </div>
                    <div class="alert alert-danger" role="alert"  id="respuestaIncorrect" style="display: none;">
                        Respuesta incorrecta :c ...
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="cerrarVideo()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props:{
        },
        data() {
            return{
                videoStop: false,
                video1:'media\\clip1.MOV',
                video2:'media\\clip2.MOV',
                video3:'media\\clip3.MOV',
                video:'',
                quizVideo1:{
                    pregunta:'¿Cuál es el primer paso a realizar?',
                    respuestas:{
                        resp1: {
                            name:'preg1',
                            resp:'Realizar las ventilaciones y compresiones correspondientes',
                            true: 0
                        },
                        resp2: {
                            name:'preg2',
                            resp:'Avaluación de la consciencia y la respiración',
                            true: 1
                        },
                        resp3: {
                            name:'preg2',
                            resp:'Poner el DESA',
                            true: 0
                        }
                    }
                },
                quizVideo2:{
                    pregunta:'Marca el orden correcto de acciones a realizar al utilizar el desfibrilador externo semiautomático.',
                    respuestas:{
                        resp1: {
                            name:'preg1',
                            resp:'1-Colocar los electrodos, 2-Realizar RCP, 3-Accionar el DESA',
                            true: 0
                        },
                        resp2: {
                            name:'preg2',
                            resp:'1-Colocar los electrodos, 2-Accionar el DESA, 3-Realizar RCP',
                            true: 0
                        },
                        resp3: {
                            name:'preg3',
                            resp:'1-Realizar RCP, 2-Colocar los electrodos, 3-Accionar el DESA',
                            true: 1
                        }
                    }
                },
                quizVideo3:{
                    pregunta:'Cuál de estas es correcta:',
                    respuestas:{
                        resp1: {
                            name:'preg1',
                            resp:'2 ventilaciones y 30 compresiones',
                            true: 1
                        },
                        resp2: {
                            name:'preg2',
                            resp:'2 ventilaciones y 28 compresiones',
                            true: 0
                        },
                        resp3: {
                            name:'preg3',
                            resp:'4 ventilaciones y 30 compresiones',
                            true: 0
                        }
                    }
                },
                quiz:{
                    pregunta:'',
                    respuestas:{
                        resp1: {
                            name:'preg1',
                            resp:'',
                            true: 1
                        },
                        resp2: {
                            name:'preg2',
                            resp:'',
                            true: 0
                        },
                        resp3: {
                            name:'preg3',
                            resp:'',
                            true: 0
                        }
                    }
                }
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.iniciar();

        },
        created(){

        },
        methods: {
            openVideoModal(numVideo){
                if (numVideo == 1 ){
                    this.video = this.video1
                    this.quiz = this.quizVideo1
                }
                if (numVideo == 2 ){
                    this.video = this.video2
                    this.quiz = this.quizVideo2
                }
                if (numVideo == 3 ){
                    this.video = this.video3
                    this.quiz = this.quizVideo3
                }

                $('#videoModal').modal('show');
                document.getElementById("respuestaCorrect").style.display = "none"
                document.getElementById("respuestaIncorrect").style.display = "none"
                var myVideo = document.getElementById("video-container");
                //myVideo.play();

                if (this.videoStop == true){
                    this.videoStop = false;
                }
            },
            iniciar()
            {
                setInterval(this.contador, 1000);
            },
            contador()
            {
                var medio = document.getElementById('video-container');

                if (medio.currentTime > medio.duration / 2 && this.videoStop == false){
                    document.getElementById("form").style.display = "block"
                    this.videoStop = true;
                    medio.pause();
                }

            },
            respuesta()
            {
                let medio = document.getElementById('video-container');
                let form = document.getElementById("form");
                let resposta1 = document.getElementById("preg1");
                let resposta2 = document.getElementById("preg2");
                let resposta3 = document.getElementById("preg3");

                let alertCorrect = document.getElementById("respuestaCorrect");
                let alertIncorrect = document.getElementById("respuestaIncorrect");

                if (resposta1.value == 1 && resposta1.checked == true){
                    alertCorrect.style.display = "block";
                    alertIncorrect.style.display = "none";
                    form.style.display = "none";
                    medio.play();
                }
                else if (resposta2.value == 1 && resposta2.checked == true){
                    alertCorrect.style.display = "block";
                    alertIncorrect.style.display = "none";
                    form.style.display = "none";
                    medio.play();
                }
                else if (resposta3.value == 1 && resposta3.checked == true){
                    alertCorrect.style.display = "block";
                    alertIncorrect.style.display = "none";
                    form.style.display = "none";
                    medio.play();
                }
                else{
                    alertCorrect.style.display = "none";
                    alertIncorrect.style.display = "block";
                    this.noRespuesta();
                }
            },
            noRespuesta()
            {
                document.getElementById("form").style.display = "none"
                var medio = document.getElementById('video-container');
                medio.currentTime = 0;
                medio.play();
                this.videoStop = false;
            },
            cerrarVideo()
            {
                var medio = document.getElementById('video-container');

                document.getElementById("respuestaCorrect").style.display = "none"
                document.getElementById("respuestaIncorrect").style.display = "none"

                medio.pause();

                medio.currentTime = 0;
            }

        }

    }
</script>
