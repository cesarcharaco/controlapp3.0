<div class="vistaColumnaArriendos EliminarArriendo border border-danger shadow" id="EliminarArriendo" style="display: none; border-radius: 30px !important;">
    <div class="card-body">
      
      {!! Form::open(['route' => ['eliminar_alquiler'], 'method' => 'POST']) !!}
        @csrf
        <h3>¿Está realmente seguro de querer eliminar este Arriendo?</h3> 
        Se eliminarán todos los datos y pagos relacionados a este arriendo.
        <div class="float-right">
          <input type="text" name="id" class="id_ArriendoE" id="id_ArriendoE">
          <input type="text" name="id_instalacion" class="id_ArriendoE" id="id_instalacion">
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      {!! Form::close() !!}
    </div>
</div>