@if ($dish->exists)
    <form action="{{ route('dishes.update', $dish->id) }}" method="POST" class="row g-3">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('dishes.store') }}">
@endif
@csrf
{{-- NAME --}}
<div class="col-md-6 mb-4">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $dish->name) }}">
    @error('name')
        <div class="invalid-feedback">
            Inserisci un nome valido
        </div>
    @enderror
</div>
{{-- ENTRY --}}
<div class="offset-md-1 col-md-5  mb-4">
    <label for="entry" class="form-label">Portata</label>
    <input type="text" class="form-control @error('entry') is-invalid @enderror" id="entry" name="entry"
        value="{{ old('entry', $dish->entry) }}">
    @error('content')
        <div class="invalid-feedback">
            Inserisci la portata
        </div>
    @enderror
</div>
{{-- PRICE --}}
<div class="col-md-3  mb-4">
    <label for="price" class="form-label">Prezzo</label>
    <input type="number" class="form-control @error('price') is-invalid @enderror" min="0.00" step="0.01" name="price"
        id="price" value="{{ old('price', $dish->price) }}">
    @error('price')
        <div class="invalid-feedback">
            Inserisci un importo
        </div>
    @enderror
</div>
{{-- PICTURE --}}
<div class="col-md-7  mb-4">
    <label for="picture" class="form-label">Link immagine</label>
    <input type="text" class="form-control" id="picture" name="picture"
        value="{{ old('picture', $dish->picture) }}">
</div>
{{-- <div class="col-md-3">
        <div class="col-2">
            <label for="picture">Oppure scegli file</label>
            <input type="file" size='500' name="picture" id="picture">
        </div>
    </div> --}}
{{-- PREVIEW IMMAGINE DA GESTIRE CON JAVASCRIPT --}}
<div class="col-md-2 d-flex align-items-center justify-content-center">
    <img src="{{ $dish->picture ?? 'https://montagnolirino.it/wp-content/uploads/2015/12/immagine-non-disponibile.png' }}"
        alt="picture" width="60" class="img-fluid">
</div>
{{-- DESCRIPTION --}}
<div class="col-md-12  mb-4">
    <label for="description" class="form-label">Descrizione</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
        rows="3" value="">{{ old('description', $dish->description) }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            Inserisci una descrizione di almeno 10 lettere
        </div>
    @enderror
</div>
{{-- BOOLEANS --}}
<div class="col-md-12">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="available" name="available" value="1"
            {{ $dish->available ? 'checked' : '' }}>
        <label class="form-check-label" for="available">Disponibile</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="gluten_free" name="gluten_free" value="1"
            {{ $dish->gluten_free ? 'checked' : '' }}>
        <label class="form-check-label" for="gluten_free">Gluten Free</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="frozen" name="frozen" value="1"
            {{ $dish->frozen ? 'checked' : '' }}>
        <label class="form-check-label" for="frozen">Surgelato</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="vegetarian" name="vegetarian" value="1"
            {{ $dish->vegetarian ? 'checked' : '' }}>
        <label class="form-check-label" for="vegetarian">Vegetariano</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="vegan" name="vegan" value="1"
            {{ $dish->vegan ? 'checked' : '' }}>
        <label class="form-check-label" for="vegan">Vegano</label>
    </div>
</div>
<div class="col-12 mt-3">
    <button type="submit" class="btn btn-primary">Salva</button>
</div>
</form>
