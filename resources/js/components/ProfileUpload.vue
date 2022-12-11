<template>
    <upload2
        field="file"
        @crop-success="cropSuccess"
        @crop-upload-success="cropUploadSuccess"
        @onCrop-success="cropUploadSuccess"
        @crop-upload-fail="cropUploadFail"
        @close="closeUploadFail"
        :value="show"
        :width="250"
        :height="250"
        url="/profile/mini"
        :params="{'_token': computed_int_csr_token}"
        :headers="headers"
        img-format="png"
        :langExt="langExt"
        :override-upload="upload"
    ></upload2>
</template>

<script setup>
import upload2  from "./Upload2.vue";
import {ref,onMounted,computed} from "vue"
const props = defineProps({
  csf_token_start: String
})
const int_csr_token = ref("")
onMounted(()=>{
    int_csr_token.value = getCookie('XSRF-TOKEN')
})
const show = ref(false)
function getCookie(name) {
    //console.log("buscando...")
    //console.log(document.cookie)
  const namecookie_part = `; ${document.cookie}`;
  const parts = namecookie_part.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}
const computed_int_csr_token = computed({
    get() {
        console.log(int_csr_token.value)
        console.log(getCookie('XSRF-TOKEN'))
        return getCookie('XSRF-TOKEN')
    },
    set(val) {
        int_csr_token.value = val
    }
})
const params = ref({
    //"X-CSRF-TOKEN": computed_int_csr_token.value
})
const headers = ref({
            'X-XSRF-TOKEN':computed_int_csr_token.value,
            'Content-Type': "multipart/form-data",
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
const imgDataUrl = ref("")
const cropUploadSuccess =function(data){
    console.log("Porfin!!!")
    console.log(data)
    show.value = false
}
const cropUploadFail = function(...data){
    console.log("-----crop fail -----")
    console.log(data)
}
const upload = function(b64){

    return axios.post('/profile/mini',{file:b64})
}
const cropSuccess = (imgDataUrl, field) =>{
            var profile = document.getElementById('id-profile')
            profile.setAttribute('src',imgDataUrl)
        }
function start(event){
    show.value = true
}
const closeUploadFail = function($event){
    show.value =false
}

defineExpose({start})
</script>

<style></style>
