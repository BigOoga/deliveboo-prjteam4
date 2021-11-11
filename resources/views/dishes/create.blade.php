{{-- method="POST" action="{{ route('restaurants.store') }}" --}}
<form method="POST" action="{{ route('dishes.store') }}" enctype="multipart/form-data">
    @csrf
    <div class=" container">

        <h2>Crea Piatto</h2>

        {{-- NAME --}}
        <div class="form-row mt-3">
            <div class="form-group col-4">
                <label for="name">Nome Piatto</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>


        {{-- DESCRIPTION --}}
        <div class="form-row">
            <div class="form-group col-8">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
            </div>
        </div>
        {{-- ENTRY --}}
        <div class="form-row mt-3">
            <div class="form-group col-4">
                <label for="entry">Portata</label>
                <input type="text" class="form-control" id="entry" name="entry">
            </div>
        </div>

        {{-- PRICE --}}
        <div class="form-row">
            <div class="form-group col-2">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control" min="0.00" step="0.01" name="price" id="price" value="0.00">
            </div>
        </div>

        {{-- BOOLEANS --}}
        <div class="form-row">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="available" name="available" value="1">
                <label class="form-check-label" for="available">Disponibile</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="gluten_free" name="gluten_free" value="1">
                <label class="form-check-label" for="gluten_free">Gluten Free</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="frozen" name="frozen" value="1">
                <label class="form-check-label" for="frozen">Surgelato</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="vegetarian" name="vegetarian" value="1">
                <label class="form-check-label" for="vegetarian">Vegetariano</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="vegan" name="vegan" value="1">
                <label class="form-check-label" for="vegan">Vegano</label>
            </div>
        </div>


        {{-- UPLOAD --}}
        <div class="form-row">
            <div class="form-group col-2">
                <label for="picture">Immagine</label>
                <input type="file" size='500' name="picture" id="picture">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-2">
                <button type="submit" class="btn btn-primary">Invia</button>
            </div>
        </div>
        <a class="btn btn-success my-2" href="{{ route('dishes.index') }}">Torna alla lista</a>
        <a class="btn btn-success" href="{{ route('restaurants.dashboard') }}">Torna alla dashboard</a>
        <a href=""></a>
    </div>
</form>
