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
                            <button type="button" class="btn btn-info" @click="openVideoModalVideo1()">Muestra</button>
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
                    <div id='Alert'>

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
                correctas: 0,
                incorrectas: 0,
                noRespondidas: 0,
                videoStop: false,
                videoFalse: false,
                checkQuiz1Video1:false,
                checkQuiz2Video1:false,
                checkQuiz3Video1:false,
                checkQuiz4Video1:false,
                video1End: false,
                video1:'media\\clip1.MOV',
                video2:'media\\clip2.MOV',
                video3:'media\\clip3.MOV',
                video:'',
                quiz1Video1:{
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
                            name:'preg3',
                            resp:'Poner el DESA',
                            true: 0
                        }
                    }
                },
                quiz2Video1:{
                    pregunta:'¿Cuál de las siguientes opciones es una característica de una RCP de calidad?',
                    respuestas:{
                        resp1: {
                            name:'preg1',
                            resp:'Evitar una ventilación excesiva',
                            true: 1
                        },
                        resp2: {
                            name:'preg2',
                            resp:'Mantener un ritmo de compresiones frenético',
                            true: 0
                        },
                        resp3: {
                            name:'preg3',
                            resp:'Iniciar las compresiones después de 10 segundos desde la identificación del paro cardiaco',
                            true: 0
                        }
                    }
                },
                quiz3Video1:{
                    pregunta:'¿Qué es el método AVDI?',
                    respuestas:{
                        resp1: {
                            name:'preg1',
                            resp:'Es un método para determinar cuantas compresiones hay que realizar',
                            true: 0
                        },
                        resp2: {
                            name:'preg2',
                            resp:'Es una variante de la RCP',
                            true: 0
                        },
                        resp3: {
                            name:'preg3',
                            resp:'Es un método para evaluar el estado de conciencia de una persona',
                            true: 1
                        }
                    }
                },
                quiz4Video1:{
                    pregunta:'¿A que distancia desciende el esternón en un niño entre uno y ocho años?',
                    respuestas:{
                        resp1: {
                            name:'preg1',
                            resp:'Debe descender de 5 a 6 cm',
                            true: 0
                        },
                        resp2: {
                            name:'preg2',
                            resp:'Debe descender de 3 a 4 cm',
                            true: 1
                        },
                        resp3: {
                            name:'preg3',
                            resp:'Debe descender de 2 a 3 cm',
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
                    this.quiz = this.quiz1Video1
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
                //document.getElementById("respuestaCorrect").style.display = "none"
                //document.getElementById("respuestaIncorrect").style.display = "none"
                //var myVideo = document.getElementById("video-container");
                //myVideo.play();

                if (this.videoStop == true){
                    this.videoStop = false;
                }
            },
            iniciar()
            {
                setInterval(this.contador, 1000);
            },
            openVideoModalVideo1(){
                this.video = this.video1;
                this.quiz = this.quiz1Video1;
                this.videoFalse = true;
                this.video1End = false;
                this.setQuizToFalse();
                this.setAnswersTo0();
                $('#videoModal').modal('show');
            },
            contador()
            {
                var medio = document.getElementById('video-container');

                if (this.videoFalse == true){
                    if (medio.currentTime >= 50 && medio.currentTime <= 51 && this.checkQuiz1Video1 == false){
                        document.getElementById("form").style.display = "block";
                        this.checkQuiz1Video1 = true;
                        //this.videoStop = true;

                        medio.pause();
                    }
                    if (medio.currentTime >= 101 && medio.currentTime <= 102 && this.checkQuiz2Video1 == false){
                        this.quiz = this.quiz2Video1;
                        document.getElementById("form").style.display = "block"
                        this.checkQuiz2Video1 = true;
                        //this.videoStop = true;
                        medio.pause();
                    }
                    if (medio.currentTime >= 151 && medio.currentTime <= 152 && this.checkQuiz3Video1 == false){
                        this.quiz = this.quiz3Video1;
                        document.getElementById("form").style.display = "block"
                        this.checkQuiz3Video1 = true;
                        //this.videoStop = true;
                        medio.pause();
                    }
                    if (medio.currentTime >= 202 && medio.currentTime <= 203 && this.checkQuiz4Video1 == false ) {
                        this.quiz = this.quiz4Video1;
                        document.getElementById("form").style.display = "block"; //this.videoStop = true;
                        this.checkQuiz4Video1 = true;
                        medio.pause();
                    }
                    if (medio.currentTime >= 216 && medio.currentTime <= 217){
                        if (this.video1End == false) {
                            if( this.correctas  > 0){
                                this.crearAlertCorrect();
                            }
                            if( this.incorrectas > 0){
                                this.crearAlertIncorrect();
                            }
                            if( this.noRespondidas > 0){
                                this.crearAlertNoRespuesta();
                            }
                            this.video1End = true;
                            medio.pause();
                        }
                    }
                }
                else{
                    if (medio.currentTime > medio.duration / 2 && this.videoStop == false){
                        document.getElementById("form").style.display = "block"
                        this.videoStop = true;
                        medio.pause();
                    }
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


                if (this.videoFalse == true){
                    if (resposta1.value == 1 && resposta1.checked == true){
                        this.correctas = this.correctas + 1;
                        form.style.display = "none";
                        medio.play();
                    }
                    else if (resposta2.value == 1 && resposta2.checked == true){
                        this.correctas = this.correctas + 1;
                        form.style.display = "none";
                        medio.play();
                    }
                    else if (resposta3.value == 1 && resposta3.checked == true){
                        this.correctas = this.correctas + 1;
                        form.style.display = "none";
                        medio.play();
                    }
                    else if (resposta1.value == 0 && resposta1.checked == true){
                        this.incorrectas = this.incorrectas + 1;
                        form.style.display = "none";
                        medio.play();
                    }
                    else if (resposta2.value == 0 && resposta2.checked == true){
                        this.incorrectas = this.incorrectas + 1;
                        form.style.display = "none";
                        medio.play();
                    }
                    else if (resposta3.value == 0 && resposta3.checked == true){
                        this.incorrectas = this.incorrectas + 1;
                        form.style.display = "none";
                        medio.play();
                    }
                    else{
                        this.noRespuesta();
                    }
                }
                else{
                    if (resposta1.value == 1 && resposta1.checked == true){
                        this.crearAlertCorrect();
                        form.style.display = "none";
                        medio.play();
                    }
                    else if (resposta2.value == 1 && resposta2.checked == true){
                        this.crearAlertCorrect();
                        form.style.display = "none";
                        medio.play();
                    }
                    else if (resposta3.value == 1 && resposta3.checked == true){
                        this.crearAlertCorrect();
                        form.style.display = "none";
                        medio.play();
                    }
                    else{
                        this.crearAlertIncorrect();
                        this.noRespuesta();
                    }
                }

                this.uncheck();
            },
            noRespuesta()
            {
                document.getElementById("form").style.display = "none";
                var medio = document.getElementById('video-container');

                this.videoStop = false;
                if (this.videoFalse == true){
                    this.noRespondidas = this.noRespondidas + 1;
                    medio.play();
                }else{
                medio.currentTime = 0;
                medio.play();
                }

                this.uncheck();
            },
            cerrarVideo()
            {
                var medio = document.getElementById('video-container');

                //document.getElementById("respuestaCorrect").style.display = "none"
                //document.getElementById("respuestaIncorrect").style.display = "none"

                medio.pause();

                medio.currentTime = 0;

                this.uncheck();
            },
            crearAlertCorrect()
            {
                var div = document.getElementById("Alert");

                var p = document.createElement('div');
                p.setAttribute("id", "respuestaCorrect");
                p.setAttribute("class", "alert alert-success");
                p.setAttribute("role", "alert");

                if( this.videoFalse == true ){
                    var t = document.createTextNode("Has acertado un total de "+ this.correctas + " preguntas.");
                }
                else{
                    var t = document.createTextNode("Respuesta correcta!!!");
                }

                var button = document.createElement("button");
                button.setAttribute("type","button");
                button.setAttribute("class","close");
                button.setAttribute("data-dismiss","alert");
                button.setAttribute("aria-label","Close");

                var span = document.createElement("span");
                span.setAttribute("aria-hidden","true");

                var t2 = document.createTextNode("X");

                span.appendChild(t2);
                button.appendChild(span);

                p.appendChild(t);
                p.appendChild(button);
                div.appendChild(p);

            },
            crearAlertIncorrect()
            {


                var div = document.getElementById("Alert");

                var p = document.createElement('div');
                p.setAttribute("id", "respuestaIncorrect");
                p.setAttribute("class", "alert alert-danger");
                p.setAttribute("role", "alert");
                if( this.videoFalse == true ){
                    var t = document.createTextNode("Has fallado un total de "+ this.incorrectas + " preguntas.");
                }
                else{
                    var t = document.createTextNode("Respuesta incorrecta :c ...");
                }

                var button = document.createElement("button");
                button.setAttribute("type","button");
                button.setAttribute("class","close");
                button.setAttribute("data-dismiss","alert");
                button.setAttribute("aria-label","Close");

                var span = document.createElement("span");
                span.setAttribute("aria-hidden","true");

                var t2 = document.createTextNode("X");

                span.appendChild(t2);
                button.appendChild(span);

                p.appendChild(t);
                p.appendChild(button);
                div.appendChild(p);

            },
            crearAlertNoRespuesta()
            {
                let num = this.noRespondidas;
                if(num > 0){
                    var div = document.getElementById("Alert");

                    var p = document.createElement('div');
                    p.setAttribute("id", "respuestaNoRespuesta");
                    p.setAttribute("class", "alert alert-dark");
                    p.setAttribute("role", "alert");
                    var t = document.createTextNode("No has respondido " + num + " preguntas.");
                    var button = document.createElement("button");
                    button.setAttribute("type","button");
                    button.setAttribute("class","close");
                    button.setAttribute("data-dismiss","alert");
                    button.setAttribute("aria-label","Close");

                    var span = document.createElement("span");
                    span.setAttribute("aria-hidden","true");

                    var t2 = document.createTextNode("X");

                    span.appendChild(t2);
                    button.appendChild(span);

                    p.appendChild(t);
                    p.appendChild(button);
                    div.appendChild(p);
                }


            },
            setQuizToFalse(){
                this.checkQuiz1Video1 = false;
                this.checkQuiz2Video1 = false;
                this.checkQuiz3Video1 = false;
                this.checkQuiz4Video1 = false;
            },
            setAnswersTo0(){
                this.correctas = 0;
                this.incorrectas = 0;
                this.noRespondidas = 0;
            },
            uncheck(){
                document.getElementById('preg1').checked = false;
                document.getElementById('preg2').checked = false;
                document.getElementById('preg3').checked = false;
            }

        }

    }
</script>
