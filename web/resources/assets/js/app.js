window.bus = new Vue({});

Vue.component('identifier-component', require('./components/IdentifierComponent.vue'));
Vue.component('google-maps', require('./components/GoogleMapsComponent.vue'));

var app = window.app = new Vue({
    el: '#app',
    methods: {
        initMaps(){
            window.bus.$emit('loadMaps', true)
        }
    }
});
