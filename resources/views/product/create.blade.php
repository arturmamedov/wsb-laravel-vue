<form action="/products" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="text" name="name" placeholder="Nome" />
    <input type="text" name="description" placeholder="Descrizione" />

    <input type="text" name="price" placeholder="Prezzo (1.24)" />

    <button type="submit">Crea</button>
</form>
