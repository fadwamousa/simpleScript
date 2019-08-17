

require('./bootstrap');

window.Vue = require('vue');



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('apply-component', require('./components/ApplyComponent.vue').default);
Vue.component('favorite-component', require('./components/favouriteComponent.vue').default);
Vue.component('search-component', require('./components/searchComponent.vue').default);





const app = new Vue({
    el: '#app',
});
