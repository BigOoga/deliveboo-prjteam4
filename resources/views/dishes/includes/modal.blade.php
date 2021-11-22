<a href="#" class="clickable text-dark" data-toggle="modal" data-target="#delete{{$dish->id}}">
  <i class="far fa-trash-alt fs-4 p-2  mx-2"></i>
</a>

<div class="modal fade" id="delete{{$dish->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Conferma cancellazione</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="delete_id" value="{{$dish->id}}">
          <p>Stai per cancellare il piatto {{$dish->name}}. Sei sicuro?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" name="delete" class="btn btn-primary">Sì</button>
        </div>
      </div>
    </div>
  </div>          
