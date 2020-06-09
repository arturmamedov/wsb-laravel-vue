<template>
    <div class="row">
        <div class="col-sm-6 order-1">
            <h2>Crea Prodotto</h2>

            <form class="" action="/products" method="POST" @submit.prevent="onSubmit">
                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}">-->

                <div class="col-12 mb-3">
                    <input class="form-control product-name" type="text" name="name" placeholder="Nome" autofocus ref="productNameInput" required v-model="name" @keyup="searchProduct" />
                </div>
                <div class="col-12 mb-3">
                    <input class="form-control" type="text" name="description" placeholder="Descrizione" v-model="description" />
                </div>
                <div class="col-12 mb-3">
                    <input class="form-control" type="text" name="price" placeholder="Prezzo (1.24)" required v-model="price" />
                </div>
                <div class="col-12 mb-3">
                    <button class="btn btn-primary btn-block" type="submit">Crea</button>
                </div>
            </form>
        </div>

        <div class="col-sm-6 order-2">
            <product-list-component></product-list-component>
        </div>
    </div>
</template>

<script>
    import ProductsListComponent from './ProductsListComponent.vue';

    export default {
        data: function() {
            return {
                // for form
                name: '',
                description: '',
                price: '',

                shop_id: '', // servira per selezionare in che negozio salvare il prodotto
            }
        },

        components: {
            'product-list-component': ProductsListComponent,
        },

        // computed: {
        // },

        // mounted () {
        // },

        methods: {
            onSubmit() {
                let self = this;

                axios.post('/api/products', this.$data)
                    .then(function(response) {
                        // alert(response.data.message);

                        // self.products.unshift(response.data.product); // add to array
                        // ProductsListComponent.getProducts(); // get all from server again
                        Event.$emit('product-created'); // emit event of created for get all products again

                        self.name = '';
                        self.description = '';
                        self.price = '';

                        // $(".product-name").focus(); // jquery
                        self.$refs.productNameInput.focus(); // vue
                    });
            },
            searchProduct() {
                console.info(this.name);
                Event.$emit('product-name-type', this.name);
            }
        }
    }
</script>
