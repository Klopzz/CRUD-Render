<div class="modal fade" id="eliminarModal{{ $libro->id }}" tabindex="-1" aria-labelledby="eliminarModalLabel{{ $libro->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h1 class="modal-title fs-5" id="eliminarModalLabel{{ $libro->id }}">Eliminar Libro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('libros.borrar', $libro->id) }}">
            @csrf
            @method('DELETE')
            <div class="form-group mb-2">
                <label>Nombre:</label>
                <input type="text" class="form-control" value="{{ $libro->nombre }}" readonly>
            </div>
            <div class="form-group mb-2">
                <label>Descripción:</label>
                <input type="text" class="form-control" value="{{ $libro->descripcion }}" readonly>
            </div>
            <div class="form-group mb-2">
                <label>Autor:</label>
                <input type="text" class="form-control" value="{{ $libro->autor ? $libro->autor->nombre : '' }}" readonly>
            </div>
            <button type="submit" class="btn btn-danger w-100 mt-2">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>