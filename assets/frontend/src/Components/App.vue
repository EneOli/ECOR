<template>
    <div class="root">
        <Header></Header>
        <div>
            <div id="wrapper">
                <!-- Sidebar -->
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <router-link to="/">
                            <li class="sidebar-brand">
                                <a>
                                    <i class="fas fa-home"></i> <span>Übersicht</span>
                                </a>
                            </li>
                        </router-link>
                       <!-- <li>
                            <a href="#"><i class="fas fa-wrench minimized"></i> <span class="text">Einstellungen</span></a>
                        </li> -->
                        <router-link to="/info">
                            <li>
                                <a href="#"><i class="fas fa-info-circle minimized"></i><span class="text"> Info</span></a>
                            </li>
                        </router-link>
                        <a id="changeButton" v-on:click="click"><i
                                class="fas fa-arrow-circle-left back-button"></i></a>
                    </ul>
                </div>
                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <router-view></router-view>
                    </div>
                </div>
                <!-- /#page-content-wrapper -->

            </div>
            <!-- /#wrapper -->
        </div>
    </div>

</template>

<script lang="ts">
    import Vue from "vue";
    import Component from "vue-class-component";
    import * as $ from "jquery";

    import Header from "./Header";
    import List from "./List";

    @Component({components: {Header, List}})
    export default class App extends Vue
    {
        private enlarge: boolean = false;

        public click()
        {
            let minimize = $("ul.sidebar-nav li a").not("li.sidebar-brand a .minimized");
            let notMinimize = $("ul.sidebar-nav li a span").not("li.sidebar-brand a .minimized");
            let title = $("ul.sidebar-nav li.sidebar-brand span");
            let changeButton = $("#changeButton");
            if (this.enlarge)
            {
                $("#wrapper").css("margin-left", "0px");
                $("#sidebar-wrapper").css("width", "250px");
                notMinimize.show();
                title.show();
                minimize.css("margin-right", "0");
                minimize.css("margin-left", "0");
                minimize.css("padding-bottom", "0");
                minimize.css("padding-top", "0");
                minimize.css("margin-bottom", "0");
                minimize.css("margin-top", "0");
                minimize.css("transform", "scale(1.0)");
                changeButton.children("i").toggleClass("fa-arrow-circle-left");
                changeButton.children("i").toggleClass("fa-arrow-circle-right");
                changeButton.children("i").css("float", "right");
                this.enlarge = false;
            } else
            {
                $("#wrapper").css("margin-left", "-200px");
                $("#sidebar-wrapper").css("width", "50px");
                notMinimize.hide();
                title.hide();
                minimize.css("margin-right", "50px");
                minimize.css("margin-left", "-10px");
                minimize.css("padding-bottom", "5px");
                minimize.css("padding-top", "5px");
                minimize.css("margin-bottom", "10px");
                minimize.css("margin-top", "10px");
                minimize.css("transform", "scale(1.2)");
                changeButton.children("i").toggleClass("fa-arrow-circle-left");
                changeButton.children("i").toggleClass("fa-arrow-circle-right");
                changeButton.children("i").css("float", "left");

                this.enlarge = true;
            }
        }
    }
</script>

<style scoped>
    .root {
    @import url('../../../../public/vendor/fonts/css/opensans.css');
        font-family: "Open Sans", sans-serif;
    }

    #wrapper {
        padding-left: 50px;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    #sidebar-wrapper {
        z-index: 100;
        position: fixed;
        left: 250px;
        width: 250px;
        height: 100%;
        margin-left: -250px;
        overflow-y: auto;
        background: #3a3633;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }

    .back-button {
        float: right;
        margin: 20px 35px 20px 15px;
        transform: scale(2.0);
        left: 0;
        cursor: pointer;
    }

    .back-button:hover {
        color: #bbbbbb
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 250px;
    }

    #page-content-wrapper {
        width: 100%;
        position: absolute;
    }

    #wrapper.toggled #page-content-wrapper {
        position: absolute;
        margin-right: -250px;
    }

    /* Sidebar Styles */

    .sidebar-nav {
        position: absolute;
        top: 0;
        width: 250px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .sidebar-nav li {
        text-indent: 20px;
        line-height: 40px;
    }

    .sidebar-nav li a {
        display: block;
        text-decoration: none;
        color: #999999;
    }

    .sidebar-nav li a:hover {
        text-decoration: none;
        color: #fff;
        background: rgba(255, 255, 255, 0.2);
    }

    .sidebar-nav li a:active, .sidebar-nav li a:focus {
        text-decoration: none;
    }

    .sidebar-nav > router-link > .sidebar-brand {
        height: 65px;
        font-size: 18px;
        line-height: 60px;
    }

    .sidebar-nav > .sidebar-brand a {
        color: #999999;
    }

    .sidebar-nav > .sidebar-brand a:hover {
        color: #fff;
        background: none;
    }

    @media (min-width: 768px) {
        #wrapper {
            padding-left: 250px;
        }

        #sidebar-wrapper {
            width: 250px;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 250px;
        }

        #page-content-wrapper {
        / / padding: 20 px;
            position: relative;
        }

        #wrapper.toggled #page-content-wrapper {
            position: relative;
            margin-right: 0;
        }
    }
</style>