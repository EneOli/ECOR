<template>
    <div>
        <div class="page-header header">
            <h3 class="font header-child">ECOR - Enes Capture Of Resources</h3>
            <i v-on:click="logout" class="fas fa-sign-out-alt fa-2x header-child logout" style="display: inline;"></i>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from "vue";
    import {Component} from "vue-property-decorator";
    import LogoutBox from "./LogoutBox";

    @Component({components: {LogoutBox}})
    export default class Header extends Vue
    {
        public logout() {
            window.location.href = window.location.origin  + "/logout";
        }
    }
</script>

<style lang="css" scoped>
    @import url('../../../../public/vendor/fonts/css/opensans.css');

    .header {
        background: #f3f3f3 linear-gradient(to bottom, #f3f3f3, #e2e2e2);
        box-shadow: -11px 12px 23px rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
    }

    .header-child {
        display: inline;
    }

    .logout {
        float: right;
        margin-right: 10px;
        margin-top: 2px;
        cursor: pointer;
    }

    .logout:hover {
        color: rgba(0, 0, 0, 0.7);
    }

    .font {
        font-family: "Open Sans", sans-serif;
    }

    texts {
        text-align: center;
    }
</style>