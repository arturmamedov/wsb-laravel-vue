<div id="app">
    <form action="/products" method="POST" @submit.prevent="onSubmit">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="text" name="name" placeholder="Nome" v-model="name" required />
        <input type="text" name="description" placeholder="Descrizione" v-model="description" />

        <input type="text" name="price" placeholder="Prezzo (1.24)" v-model="price" required />

        <button type="submit">Crea</button>
    </form>


    <hr>

    @verbatim
    <ul>
        <li v-for="product in products">
            {{ product.name }} - {{ product.price }} €
        </li>
    </ul>
    @endverbatim
</div>

<script src="/js/app.js"></script>
