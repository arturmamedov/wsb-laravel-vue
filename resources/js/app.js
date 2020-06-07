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

    mounted () {
        axios.get('/api/products')
            .then(resposne => this.products = resposne.data);
    },

    methods: {
        onSubmit() {
            let self = this;

            axios.post('/api/products', this.$data)
                .then(function(response) {
                    // alert(response.data.message);

                    self.products.push(response.data.product);

                    self.name = '';
                    self.description = '';
                    self.price = '';
                });
        }
    }
});
