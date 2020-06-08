<template>
    <div class="row">
        <div class="col-sm-6 order-1">
            <h2>Crea Prodotto</h2>

            <form class="" action="/products" method="POST" @submit.prevent="onSubmit">
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}">-->

                <div class="col-12 mb-3">
                    <input class="form-control" type="text" name="name" placeholder="Nome" v-model="name" required/>
                </div>
                <div class="col-12 mb-3">
                    <input class="form-control" type="text" name="description" placeholder="Descrizione" v-model="description"/>
                </div>
                <div class="col-12 mb-3">
                    <input class="form-control" type="text" name="price" placeholder="Prezzo (1.24)" v-model="price" required/>
                </div>
                <div class="col-12 mb-3">
                    <button class="btn btn-primary btn-block" type="submit">Crea</button>
                </div>
            </form>
        </div>

        <div class="col-sm-6 order-2">
            <h2>Lista prodotti creati</h2>
            <ul class="list-group">
                <li v-for="product in searchProducts" class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ product.name }}</h6>
                        <small class="text-muted">{{ product.description }}</small>
                    </div>
                    <span class="text-muted">{{ product.price }} €</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                products: [],

                // for form
                name: '',
                description: '',
                price: '',

                shop_id: '', // servira per selezionare in che negozio salvare il prodotto
            }
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
    }
</script>
