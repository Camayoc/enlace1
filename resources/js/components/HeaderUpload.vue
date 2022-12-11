<template>
    <upload2
        field="img"
        @crop-success="cropSuccess"
        @crop-upload-success="cropUploadSuccess"
        @crop-upload-fail="cropUploadFail"
        @close="closeUploadFail"
        :override-upload="upload"
        :value="show"
        :width="800"
        :height="200"
        url="/upload"
        :params="params"
        :headers="headers"
        img-format="png"
        :langExt="langExt"
    ></upload2>
</template>

<script setup>
import upload2  from "./Upload2.vue";

import {ref} from "vue"
const show = ref(false)
const params = ref({
            token: "12321",
            name: "avatar",
        })
const headers = ref({
            smail: "*_~",
        })
const langExt = ref({
    hint: 'Haga clic o arrastre el archivo aquí para cargar',
    loading: 'Subiendo ...',
    noSupported: 'El navegador no es compatible, use IE10+ u otros navegadores',
    success: 'Subida exitosa',
    fail: 'Subida fallida',
    preview: 'Vista previa',
    btn: {
    	off: 'Cancelar',
    	close: 'CCerrar',
    	back: 'Atras',
    	save: 'Guardar'
    },
    error: {
    	onlyImg: 'Solo imagen',
    	outOfSize: 'Image exceeds size limit: ',
    	lowestPx: 'Image\'s size is too low. Expected at least: '
    }
})

const emit = defineEmits(['changeimage'])
const imgDataUrl = ref("")
const upload = function(b64){

    return axios.post('/profile/header',{file:b64})
}
function cropSuccess(payload, field) {
    console.log("-------- crop success --------");
    //imgDataUrl.value = payload;
    emit('changeimage',{payload})
}
function start(event){
    console.log("-------- start --------");
    show.value = true
}
const cropUploadSuccess = function(){
    show.value = false
}
const cropUploadFail = function($event){
    console.log($event)
}

const closeUploadFail = function($event){
    show.value =false
}

defineExpose({start})
</script>

<style></style>
