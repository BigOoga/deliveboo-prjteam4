<form >
@csrf 
<div class="container">
  <p> </p>
    <h3>Registrazione</h3>    
        <div class="form-row">
          <div class="form-group col-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email">
          </div>
          <div class="form-group col-6">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password">
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
              <label for="name">Nome attività</label>
              <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group col-6">
              <label for="iva">Partita Iva</label>
              <input type="text" class="form-control" id="iva">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-6">
              <label for="address">Indirizzo</label>
              <input type="text" class="form-control" id="address">
            </div>
          </div>
          {{-- <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
             
            </label>
          </div> --}}
        <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
</form>

{{-- method="POST" action="{{ route('admin.posts.store') }}" --}}