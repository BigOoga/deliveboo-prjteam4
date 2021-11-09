@extends('layouts.app')


<form method="POST" action="{{ route('restaurants.store')}}" >
  @csrf 
  <div class="container">
    {{-- EMAIL    --}}
    <h2>Registrazione</h2> 
      <div class="form-row mt-3">
        <div class="form-group col-4">
          <label for="email">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
        </div>
        {{-- PASSWORD --}}
        <div class="form-group col-4">
          <label for="password">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        </div>
      </div>
      {{-- NAME --}}
      <div class="form-row">
        <div class="form-group col-4">
          <label for="name">Nome attività</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" id="name" name="name">
        </div>
        {{-- P.IVA  --}}
        <div class="form-group col-4">
          <label for="iva">Partita Iva</label>
          <input type="text" class="form-control @error('iva') is-invalid @enderror" id="iva" name="iva" id="iva" name="iva">
        </div>
      </div>
      {{-- ADDRESS  --}}
      <div class="form-row">
        <div class="form-group col-8">
          <label for="address">Indirizzo</label>
          <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" id="address" name="address">
        </div>
      </div>
      {{-- DESCRIPTION  --}}
      <div class="form-row">
        <div class="form-group col-8">
          <label for="description">Descrizione</label>
          <textarea class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
      </div>
      {{-- OPENING TIME  --}}
      <div class="form-row"> 
        <div class="form-group col-2">
          <label for="openingTime">Orario di apertura</label>
          <input type="time" class="form-control @error('opening_time') is-invalid @enderror" name="opening_time" id="openingTime">
        </div>
        <div class="form-group col-2">
          <label for="closingTime">Orario di chiusura</label>
          <input type="time" class="form-control @error('closing_time') is-invalid @enderror" name="closing_time" id="closingTime">
        </div>
      </div>  
      {{-- DELIVERY FEE  --}}
      <div class="form-row">
        <div class="form-group col-2">
          <label for="deliveryFee">Spese di spedizione</label>
          <input type="number" class="form-control @error('delivery_fee') is-invalid @enderror" min="0.00" step="0.01" name="delivery_fee" id="deliveryFee">
        </div>
      </div>
      {{-- TYPES --}}
      <div class="form-row">
        <div class="form-group col-8">
          <h6>Categoria</h6>
          @foreach($types as $type)
            <div class="form-check form-check-inline">
              <input class="form-check-input " type="checkbox" value="type{{$type->id}}" id="type{{$type->id}}">
              {{-- name="types[]" @if(in_array($type->id, old('types', []))) checked @endif> --}}
              <label class="form-check-label" for="type{{$type->id}}">{{$type->name}}</label>
            </div>
          @endforeach
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-2">
          <button type="submit" class="btn btn-primary">Sign up</button>
        </div>
      </div>
  </div>
</form>


    
