<template>
    <span>
        <modal-component>
            <cropper
                class="cropper"
                :src="img"
                :stencil-props="{
                    aspectRatio: 10/10
                }"
                @change="change"
            />

        </modal-component>
    </span>
</template>

<script setup>
import { Cropper } from 'vue-advanced-cropper'
import 'vue-advanced-cropper/dist/style.css';
import { ref} from 'vue'

const img = ref( 'https://images.unsplash.com/photo-1600984575359-310ae7b6bdf2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=80')
const image = ref("")

function change({ coordinates, canvas }) {
    console.log(coordinates, canvas.toDataURL())
    image.value = canvas.toDataURL()

}
</script>

<style scoped>
.cropper {
	height: 300px;
	width: 300px;
	background: #DDD;
}


</style>
