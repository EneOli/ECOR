<template>
    <div>
        <div class="page-header header">
            <h3 class="font">ECOR - Enes Capture Of Resources</h3>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from "vue";
    import {Component} from "vue-property-decorator";

    @Component
    export default class Header extends Vue
    {
    }
</script>

<style lang="css" scoped>
    @import url('../../../../public/vendor/fonts/css/opensans.css');

    .header {
        background: #f3f3f3 linear-gradient(to bottom, #f3f3f3, #e2e2e2);
        box-shadow: -11px 12px 23px rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
    }

    .font {
        font-family: "Open Sans", sans-serif;
    }
</style>