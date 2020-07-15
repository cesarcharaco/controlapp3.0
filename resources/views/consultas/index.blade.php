@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row page-title">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb" class="float-right mt-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Consultas</li>
                            </ol>
                        </nav>
                        <h4 class="mb-1 mt-0">Consultas</h4>
                    </div>
                </div>
                @include('flash::message')
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
                        <div class="card border border-info rounded card-tabla shadow p-3 mb-5 bg-white rounded" style="display: none;">
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
        <div class="card border border-success rounded card-tabla shadow p-3 mb-5 bg-white rounded" style="display: none;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <label>Año</label>
                        <select class="form-control select2" onchange="consulta_anual(this.value)">
                            <option value="0" disabled selected>Seleccione año</option>
                            @for($j=0;$j< count($anio);$j++)
                                <option value="{{ $anio[$j] }}">{{ $anio[$j] }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border border-primary rounded card-tabla shadow p-3 mb-5 bg-white rounded" style="display: none;">
            <div class="card-body">
                <table class="table dataTable data-table-basic table-curved table-striped tabla-estilo" style="width: 100%;">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>Mes</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="muestraConsultas">
                        @for($i=0; $i < count($status_pago); $i++)
                            
                            <tr>
                                <td>{{ $status_pago[$i][0] }}</td>
                                @if ($status_pago[$i][1] == 'Pendiente') 
                                        <td class="text-warning"><strong>{{ $status_pago[$i][1] }}</strong></td>
                                @endif
                                @if ($status_pago[$i][1]== 'Cancelado')
                                        <td class="text-success"><strong>{{ $status_pago[$i][1] }}</strong></td>
                                @endif
                                @if ($status_pago[$i][1]== 'No aplica')
                                        <td class="text-danger"><strong>{{ $status_pago[$i][1] }}</strong></td>
                                @endif
                            </tr>
                        @endfor
                    </tbody>
                </table>
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
                        var status = data[i][1];
                        if (status == 'Pendiente') {
                            var status_color = '<div class="text-warning">'+status+'</div>';
                        }else if(status== 'Cancelado'){
                            var status_color = '<div class="text-success">'+status+'</div>';
                        }else{
                            var status_color = '<div class="text-danger">'+status+'</div>';
                        }
                        $('#muestraConsultas').append(
                            '<tr>'+
                                '<td>'+data[i][0]+'</td>'+
                                '<td>'+status_color+'</td>'+
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