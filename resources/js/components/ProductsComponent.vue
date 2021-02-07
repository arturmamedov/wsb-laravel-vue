<template>
    <div class="row">
        <div class="col-sm-6 order-1">
            <product-add-component></product-add-component>
        </div>

        <div class="col-sm-6 order-2">
            <product-list-component></product-list-component>
        </div>
    </div>
</template>

<script>
    import ProductsAddComponent from './ProductsAddComponent.vue';
    import ProductsListComponent from './ProductsListComponent.vue';

    export default {
        // data: function() {
        //     return {
        //     }
        // },

        components: {
            'product-add-component': ProductsAddComponent,
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
