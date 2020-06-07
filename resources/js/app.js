/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        products: [],

        // for form
        name: '',
        description: '',
        price: '',

        shop_id: '', // servira per selezionare in che negozio salvare il prodotto
    },

    computed: {
        searchProducts: function () {
            return this.products.filter(product => {
                return product.name.toLowerCase().includes(this.name.toLowerCase())
            })
        }
    },

    mounted () {
        this.getProducts();
    },

    methods: {
        onSubmit() {
            let self = this;

            axios.post('/api/products', this.$data)
                .then(function(response) {
                    // alert(response.data.message);

                    // self.products.unshift(response.data.product); // add to array
                    self.getProducts(); // get all from server again

                    self.name = '';
                    self.description = '';
                    self.price = '';
                });
        },
        getProducts() {
            axios.get('/api/products')
                .then(resposne => this.products = resposne.data);
        },
    }
});
