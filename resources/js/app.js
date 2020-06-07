import Vue from 'vue';
import axios from 'axios';

var app = new Vue({
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
