<template>
    <div v-if="!hidden" class="card">
        <div class="card-header">Espera , aun te falta completar tu enlace</div>
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">{{
                        prepend
                    }}</span>
                </div>
                <input
                    v-model="newInput"
                    type="text"
                    class="form-control"
                    id="basic-url"
                    aria-describedby="basic-addon3"
                />
            </div>
            <div class="row justify-end">
                <div class="col-4">
                    <button
                        @click="save()"
                        :disabled="!valid"
                        class="btn btn-primary"
                    >
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: {
        prepend: {
            type: String,
            default: "",
        },
    },
    data() {
        return {
            hidden: false,
            newInput: null,
        };
    },
    methods: {
        save() {
            axios
                .post("/completelink", {
                    part: this.newInput,
                })
                .then((result) => {
                    if (result.data.success) {
                        this.hidden = true;
                    }
                    console.log(result);
                })
                .catch((err) => {});
        },
    },
    computed: {
        valid() {
            if (this.newInput == null) return false;
            return this.newInput != "";
        },
    },
};
</script>

<style></style>
