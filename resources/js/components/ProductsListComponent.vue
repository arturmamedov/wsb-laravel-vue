<template>
    <div>
        <div class="row">
            <div class="col-6">
                <h2>Lista prodotti</h2>
            </div>
            <div class="col-6">
                <input type="text" placeholder="Cerca" class="form-control pull-right" v-model="name" />
            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between lh-condensed" v-for="product in searchProducts">
                <div>
                    <h6 class="my-0">{{ product.name }}</h6>
                    <small class="text-muted">{{ product.description }}</small>
                </div>
                <span class="text-muted">{{ product.price }} €</span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        // name: 'product-list',

        /*props: {
            name: String
        },*/

        data: function() {
            return {
                products: [],

                name: '',
            }
        },

        mounted () {
            this.getProducts();
        },
        created() {
            let self = this;

            // On created
            wEvent.$on('product-created', function() {
              self.name = '';
              self.getProducts();
            });

            // On type
            wEvent.$on('product-name-type', function(input) {
              console.info('Ricerca: '+input); self.name = input;
            });
        },

        computed: {
            searchProducts: function () {
                return this.products.filter(product => {
                    return product.name.toLowerCase().includes(this.name.toLowerCase())
                })
            }
        },

        methods: {
            getProducts() {
                axios.get('/api/products')
                    .then(resposne => this.products = resposne.data);
            },
        }
    }
</script>
