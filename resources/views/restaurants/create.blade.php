@extends('layouts.app')

<div class="container">
  <form method="POST" action="{{ route('restaurants.store')}}" >
  @csrf 
    <h2 class="my-4">Registrazione</h2> 
    <div class="row my-3">
      {{-- EMAIL  --}}
      <div class="col-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
        @error('email') 
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
      {{-- PASSWORD --}}
      <div class="col-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @error('password') 
          <div class="invalid-feedback">
            {{$message}}
          </div>
       @enderror
      </div>
    </div>   
    <div class="row my-3">
      {{-- NAME --}} 
      <div class="col-6">
        <label for="name" class="form-label">Nome attività</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
        @error('name') 
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
      {{-- P.IVA  --}}
      <div class="col-4">
        <label for="iva" class="form-label">Partita Iva</label>
        <input type="text" class="form-control @error('iva') is-invalid @enderror" id="iva" name="iva">
        @error('iva') 
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
    </div>  
    <div class="row my-3">
      {{-- ADDRESS  --}}
      <div class="col-10">
      <label for="address" class="form-label">Indirizzo</label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
      @error('address') 
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
      </div> 
      {{-- DESCRIPTION  --}}
      <div class="col-10 mt-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control" id="description" name="description" rows="5"></textarea>
      </div> 
    </div>
    <div class="row my-3">
      {{-- OPENING TIME  --}} 
      <div class="col-2">
        <label for="opening_time" class="form-label">Orario di apertura</label>
        <input type="time" class="form-control @error('opening_time') is-invalid @enderror" name="opening_time" id="opening_time">
        @error('opening_time') 
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>
      {{-- CLOSING TIME  --}} 
      <div class="col-2">
        <label for="closing_time" class="form-label">Orario di chiusura</label>
        <input type="time" class="form-control @error('closing_time') is-invalid @enderror" name="closing_time" id="closing_time">
        @error('closing_time') 
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
      </div>
    </div>
    <div class="row my-3">
      {{-- DELIVERY FEE  --}}
      <div class="col-2">
      <label for="deliveryFee" class="form-label">Spese di spedizione</label>
      <input type="number" class="form-control @error('delivery_fee') is-invalid @enderror" min="0.00" step="0.01" name="delivery_fee" id="deliveryFee">
      @error('delivery_fee') 
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
      </div>
    </div>
    <div class="row my-3">
      {{-- TYPES --}}
      <div class="col-8">
        <h5 class="mb-2">Categoria</h5>
        @foreach($types as $type)
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" value="type{{$type->id}}" id="type{{$type->id}}" name="type[]">
          <label class="form-check-label" for="type{{$type->id}}">{{$type->name}}</label>
        </div>
        @endforeach
      </div>
    </div>  
    <div class="row mt-4">
      <div class="col-2">
        <button type="submit" class="btn btn-primary">Sign up</button>
      </div>
    </div>
  </form>
</div>


    
