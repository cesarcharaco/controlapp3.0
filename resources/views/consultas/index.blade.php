@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Pagos</h1>
            </div>
        </div>
        @include('flash::message')

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Años</label>
                        <select class="form-control select2" onchange="consulta_anual(this.value)">
                            @foreach($status_pago as $key)
                            	<option value="{{$key->anio}}"></option>
                            @endforeach()
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>                           

@endsection

<script type="text/javascript">

</script>
@section('scripts')

<script type="text/javascript">
	function consulta_anual(anio){
		$.get("consulta/"+anio+"/buscar",function (data) {
        })
        .done(function(data) {
        	if (data.length >0) {

        	}else{

        	}
 		});
	}
</script>

@endsection