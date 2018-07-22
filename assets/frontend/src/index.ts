import Vue from "vue";
import App from "./Components/App.vue";

import List from "./Components/List.vue";
import Info from "./Components/Info.vue";
import VueRouter from "vue-router";

Vue.use(VueRouter.install);

const routes = [
    {path: '/', component: List},
    {path: '/info', component: Info}
];

const Router = new VueRouter({
    routes: routes
});
eval("var dhxWins = new dhtmlXWindows()");
new Vue({
    el: '#app',
    template: '<App/>',
    components: {
        App
    },
    router: Router
});