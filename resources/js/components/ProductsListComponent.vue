<template>
    <div>
        <div class="row">
            <div class="col-6">
                <h2>Lista prodotti ({{ products.length }})</h2>
            </div>
            <div class="col-6">
                <input type="text" placeholder="Cerca" class="form-control pull-right" v-model="name" />

                <span class="help-block" v-if="name.length">Ricerca per  "{{ name }}" risultati: {{ searchProducts.length }}</span>
            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between lh-condensed" v-for="product in searchProducts">
                <div>
                    <h6 class="my-0">{{ product.name }}</h6>
                    <small class="text-muted" v-if="product.description">{{ product.description }}</small>
                </div>
                <span class="text-muted">
                  <strong>{{ product.shop.name }}</strong> &nbsp;
                  {{ Number.parseFloat(product.price).toFixed(2) }} €
                </span>
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
              console.info('Ricerca: '+input);
              self.name = input;
            });
        },

        computed: {
            searchProducts: function () {
                return this.products.filter(product => {
                    return product.name.toLowerCase().trim().includes(this.name.toLowerCase().trim())
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
