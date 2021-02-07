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
                    <select class="form-control" name="shop_id" required v-model="shop_id">
                      <option v-for="shop in shops" :value="shop.id">{{ shop.name }}</option>
                    </select>
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
        // data: function() {
        //     return {
        //     }
        // },

        components: {
            'product-list-component': ProductsListComponent,
        },

        // computed: {
        // },

        // mounted () {
        // },

        // methods: {
        // }
    }
</script>
