<template>
    <div>
        <link rel="stylesheet" href="css/animate.css">
        <br>
        <p class="title animated flipInX">ECOR | Enes Capture of Resources</p>
        <br>
        <p class="sub">&copy; Oliver Enes | oliver@enesnet.de | www.enesnet.de</p>
        <br>
        <br>
        <img class="cat" src="imgs/cat.gif">
    </div>
</template>

<script lang="ts">
    import Vue from "vue";
    import {Component} from "vue-property-decorator";

    @Component
    export default class Info extends Vue
    {

    }
</script>

<style scoped>
    .title {
        font-size: 30px;
        text-align: center;
    }

    .sub {
        font-size: 24px;
        text-align: center;
    }

    .cat {
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -o-user-select: none;
        user-select: none;
        align-self: center;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

</style>