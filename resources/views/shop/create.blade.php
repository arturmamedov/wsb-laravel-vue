<form action="/shops" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="text" name="name" placeholder="Nome" />
    <input type="text" name="description" placeholder="Descrizione" />

    <button type="submit">Crea</button>
</form>
