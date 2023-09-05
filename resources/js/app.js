require('./bootstrap');

window.Vue = require('vue').default;

import TreeTabs from './components/TreeTabs.vue';

Vue.component('tree-tabs', TreeTabs);

const app = new Vue({
    el: '#app',
});
