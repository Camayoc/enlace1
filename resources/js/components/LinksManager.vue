<template>
    <transtion name="pfade">
        <slot></slot>
        <div class="card" v-for="(link, index) in links" :key="index">
            <div class="card-header">{{ link.platform }}</div>
            <div class="card-body">
                <input
                    :value="link.url"
                    class="form-control"
                    type="text"
                    name=""
                    id=""
                />
            </div>
        </div>

        <div class="card">
            <div class="card-header">Nuevo Enlace</div>

            <div class="card-body">
                <input
                    v-model="newModel"
                    class="form-control"
                    type="text"
                    name=""
                    id=""
                />
                <button class="btn btn-primary" @click="save()">Guardar</button>
            </div>
        </div>
    </transtion>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            links: [],
            newModel: "",
        };
    },
    methods: {
        save() {
            axios
                .post("addlink", { url: this.newModel })
                .then((result) => {
                    this.loadData();
                    this.newModel = null;
                })
                .catch((err) => {});
        },
        loadData() {
            axios
                .get("/mylinks")
                .then((result) => {
                    this.links = result.data;
                })
                .catch((err) => {});
        },
    },
    mounted() {
        this.loadData();
    },
};
</script>

<style scoped>
.card {
    transition: linear 1s;
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 5s ease;
}
</style>
