import Vue from 'vue';
import axios from 'axios';

var app = new Vue({
    el: '#app',
    data: {
        products: [],
    },

    mounted () {
        axios.get('api/products')
            .then(resposne => this.products = resposne.data);
    }
});
