<template>
    <label for="enlace" class="col-md-4 col-form-label text-md-end">{{
        label
    }}</label>

    <div class="col-md-6">
        {{ prependurl }}/<span>{{ int_value }}</span>
        <input
            id="enlace"
            type="enlace"
            :class="'form-control ' + (hasError ? 'is-invalid' : '')"
            name="enlace"
            v-model="int_value"
            required
            autocomplete="enlace"
        />
        <slot> </slot>
    </div>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            default: "",
        },
        hasError: {
            type: Boolean,
            default: false,
        },
        label: {
            type: String,
            default: "",
        },
        value: {
            type: String,
            default: "",
        },
        default: {
            type: String,
            default: "",
        },
        prependurl:{
            type: String,
            default: "/"
        }
    },
    data() {
        return {
            int_value: this.value
        }
    },
    mounted () {
        this.int_value = this.default;
    },
};
</script>

<style></style>
