@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('flash::message')
                <div class="row">
                    <div class="col-md-12">
                        <h1>Consultas</h1>
                    </div>
                </div>
                @if(!empty($errors->all()))
                    <div class="notification is-danger">
                        <h4 class="is-size-4">Por favor, valida los siguientes errores:</h4>
                        <ul>
                            @foreach ($errors->all() as $mensaje)
                                <li>
                                    {{$mensaje}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card">
                            <input type="hidden" name="id_residente" id="id_reside" value="{{\Auth::user()->id}}">
                            <div class="card-body p-0">
                                <div class="media p-3">
                                    <div class="media-body">
                                        <span class="text-muted text-uppercase font-size-12 font-weight-bold">Pago de condominio</span>
                                        <!-- <h6 class="mb-0">Pagos retrasados: </h6> -->
                                    </div>
                                 
                                    <div class="form-group">
                                        <!-- <label class="mb-0 text-primary">Pagar mes</label> -->
                                        <h6 class="mb-0"><a href="#" style="width: 100% !important;" onclick="BMesesResidente('{{$buscar->id}}')" class="btn btn-primary">Pagar</a></h6>
                                    </div>

                                
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-6 col-xl-6">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="media p-3">
                                    <div class="media-body">
                                        <span class="text-muted text-muted text-uppercase font-size-12 font-weight-bold">Multas asignadas</span>
                                        <h6 class="mb-0">Total de multas: </h6>
                                    </div>
                                    
                                    <div class="form-group">
                                        <h6 class="mb-0"><a href="#" style="width: 100% !important; position: relative;" onclick="pagarMultasResidente()" class="btn btn-danger">Pagar</a></h6>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        @php 
                            $anio=date('Y');
                        @endphp
                        <label>Meses</label>
                        <select class="form-control select2" onchange="consulta_anual(this.value)">
                            <option value="0" disabled selected>Seleccione año</option>
                            @for($i=$anio;$i<$anio+3;$i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div style="overflow-x: auto;">                            
                    <table class="data-table-basic table table-hover mb-0" id="myTable" width="100%">
                        <thead>
                            <tr>
                                <th>Mes</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="muestraConsultas">
                            @for($i=0; $i < count($status_pago); $i++)
                                <tr>
                                    <td>{{ $status_pago[$i][0] }}</td>
                                    <td>{{ $status_pago[$i][1] }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>                           

@endsection

<script type="text/javascript">

</script>
<script type="text/javascript">
	function consulta_anual(anio){
        $('#muestraConsultas').empty();
        if(anio>0){
    		$.get("consulta/"+anio+"/buscar",function (data) {
            })
            .done(function(data) {
            	if (data.length >0) {
                    for (var i = 0; i < data.length; i++) {
                        $('#muestraConsultas').append(
                            '<tr>'+
                                '<td>'+data[i][0]+'</td>'+
                                '<td>'+data[i][1]+'</td>'+
                            '</tr>'
                        );
                    }
            	}else{
                    $('#muestraConsultas').append('<tr><td colspan="2" align="center"><h3>Sin datos en el año ingresado</h3></td></tr>');
            	}
     		});
        }
	}
</script>
@section('scripts')


@endsection