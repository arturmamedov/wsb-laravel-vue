<template>
  <div>
    <h2>Crea Prodotto</h2>

    <form class="" action="/products" method="POST" @submit.prevent="onSubmit">
      <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}">-->

      <div class="col-12 mb-3">
        <input class="form-control product-name" type="text" name="name" placeholder="Nome" autofocus ref="productNameInput" required v-model="name" @keyup="searchProduct"/>
      </div>
      <div class="col-12 mb-3">
        <input class="form-control" type="text" name="description" placeholder="Descrizione" v-model="description"/>
      </div>
      <div class="col-12 mb-3">
        <input class="form-control" type="text" name="price" placeholder="Prezzo (1.24)" required v-model="price"/>
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
</template>

<script>
import ProductsListComponent from './ProductsListComponent.vue';

export default {
  data: function () {
    return {
      // for form
      name: '',
      description: '',
      price: '',

      shop_id: '', // servira per selezionare in che negozio salvare il prodotto

      shops: [],
    }
  },

  // components: {
  // },

  // computed: {
  // },

  mounted() {
    this.shops = this.getShops();
  },

  methods: {
    onSubmit() {
      let self = this;

      axios.post('/api/products', this.$data)
          .then(function (response) {
            // alert(response.data.message);

            // self.products.unshift(response.data.product); // add to array
            // ProductsListComponent.getProducts(); // get all from server again
            wEvent.$emit('product-created'); // emit event of created for get all products again (used in ProductsList)

            self.name = '';
            self.description = '';
            self.price = '';

            // $(".product-name").focus(); // jquery
            self.$refs.productNameInput.focus(); // vue
          });
    },
    searchProduct() {
      // on name form input emit event for search product (used in ProductsList)
      wEvent.$emit('product-name-type', this.name);
    },
    getShops() {
      return axios.get('/api/shops')
          .then(resposne => this.shops = resposne.data);
    }
  }
}
</script>
