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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                video1:'media\\clip1.MOV',
                video2:'media\\clip2.MOV',
                video3:'media\\clip3.MOV',
                video:''
            }
        },
        mounted() {
            console.log('Component mounted.');

        },
        created(){

        },
        methods: {
            openVideoModal(numVideo){
                if (numVideo == 1 ){
                    this.video = this.video1
                }
                if (numVideo == 2 ){
                    this.video = this.video2
                }
                if (numVideo == 3 ){
                    this.video = this.video3
                }

                $('#videoModal').modal('show');
                var myVideo = document.getElementById("video-container");
                myVideo.play();
            }

        }

    }




</script>
