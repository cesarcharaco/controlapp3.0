@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div style="margin-right: -25px;">
                @if(\Auth::user()->tipo_usuario=="Admin")
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            @include('flash::message')
                            <div class="row">
                            <div class="col-md-12">
                                <h1>Home</h1>
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
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Inmuebles</span>
                                                <h6 class="mb-0">Existencia: {{ existencia_i() }}</h6>
                                                <h6 class="mb-0">Alquilados: {{ alquilados_i_t() }}</h6>
                                            </div>
                                         
                                            <div class="form-group">
                                                <label class="mb-0 text-primary">Nuevo Inmueble</label>
                                                <h6 class="mb-0"><a href="#" style="width: 100% !important;" data-toggle="modal" data-target="#crearInmueble"  class="btn btn-primary">Agregar</a></h6>
                                            </div>

                                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-6">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-muted text-uppercase font-size-12 font-weight-bold">Estacionamientos</span>
                                                <h6 class="mb-0">Existencia: {{ existencia_e() }}</h6>
                                                <h6 class="mb-0">Alquilados: {{ alquilados_e_t() }}</h6>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="mb-0 text-danger">Nuevo Estacionamiento</label>
                                                <h6 class="mb-0"><a href="#" style="width: 100% !important; position: relative;" data-toggle="modal" data-target="#crearEstacionamiento" class="btn btn-danger">Agregar</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Residentes</span>
                                                <h6 class="mb-0">Registrados: {{ residentes() }}</h6>
                                                <p class="mb-0">C/Inmuebles:{{ residentes_alquilados_i() }}</p>
                                                <p class="mb-0">C/Estaciona.:{{ residentes_alquilados_e() }}</p>
                                                
                                                <br><br>
                                            </div>
                                            
                                        <div class="form-group">
                                                <label class="mb-0 text-success">Nuevo Residente</label>
                                                <h6 class="mb-0"><a href="#" style="width: 100% !important; position: relative;" class="btn btn-success" onclick="NuevoResidente()">Agregar</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-6">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Pago Común</span>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <h6><input type="text" readonly="" class="form-control-plaintext text-primary" id="example-static" value="Costo Inmueble"></h6>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <h6><a href="#" style="width: 100% !important;" onclick="PagoC(1)" class="btn btn-primary">Registrar</a></h6>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <h6><a href="#" style="width: 100% !important;" onclick="PagoC(3)" class="btn btn-warning">Editar</a></h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <h6><input type="text" readonly="" class="form-control-plaintext text-danger" id="example-static" value="Costo Estacionamiento"></h6>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <h6><a href="#" style="width: 100% !important;" onclick="PagoC(2)" class="btn btn-primary">Registrar</a></h6>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <h6><a href="#" style="width: 100% !important;" onclick="PagoC(4)" class="btn btn-warning">Editar</a></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           {{--  <div class="col-md-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="media p-3">
                                            <div class="media-body">
                                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">New
                                                    Visitors</span>
                                                <h2 class="mb-0">750</h2>
                                            </div>
                                            <div class="align-self-center" style="position: relative;">
                                                <div id="today-new-visitors-chart" class="apex-charts" style="min-height: 45px;"><div id="apexcharts8pshvzb5k" class="apexcharts-canvas apexcharts8pshvzb5k light" style="width: 90px; height: 45px;"><svg id="SvgjsSvg1653" width="90" height="45" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1655" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1654"><clipPath id="gridRectMask8pshvzb5k"><rect id="SvgjsRect1660" width="92" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><clipPath id="gridRectMarkerMask8pshvzb5k"><rect id="SvgjsRect1661" width="92" height="47" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect></clipPath><linearGradient id="SvgjsLinearGradient1667" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1668" stop-opacity="0.45" stop-color="rgba(255,190,11,0.45)" offset="0.45"></stop><stop id="SvgjsStop1669" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop><stop id="SvgjsStop1670" stop-opacity="0.05" stop-color="rgba(255,255,255,0.05)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1659" x1="0" y1="0" x2="0" y2="45" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="45" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1673" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1674" class="apexcharts-xaxis-texts-g" transform="translate(0, 1.875)"></g></g><g id="SvgjsG1677" class="apexcharts-grid"><line id="SvgjsLine1679" x1="0" y1="45" x2="90" y2="45" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1678" x1="0" y1="1" x2="0" y2="45" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1663" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1664" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1671" d="M 0 45L 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003C 90 20.700000000000003 90 20.700000000000003 90 45M 90 20.700000000000003z" fill="url(#SvgjsLinearGradient1667)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask8pshvzb5k)" pathTo="M 0 45L 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003C 90 20.700000000000003 90 20.700000000000003 90 45M 90 20.700000000000003z" pathFrom="M -1 45L -1 45L 9 45L 18 45L 27 45L 36 45L 45 45L 54 45L 63 45L 72 45L 81 45L 90 45"></path><path id="SvgjsPath1672" d="M 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003" fill="none" fill-opacity="1" stroke="#ffbe0b" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask8pshvzb5k)" pathTo="M 0 33.75C 3.15 33.75 5.85 15.3 9 15.3C 12.15 15.3 14.85 26.55 18 26.55C 21.15 26.55 23.85 6.75 27 6.75C 30.15 6.75 32.85 16.650000000000002 36 16.650000000000002C 39.15 16.650000000000002 41.85 33.75 45 33.75C 48.15 33.75 50.85 25.2 54 25.2C 57.15 25.2 59.85 39.6 63 39.6C 66.15 39.6 68.85 28.8 72 28.8C 75.15 28.8 77.85 40.95 81 40.95C 84.15 40.95 86.85 20.700000000000003 90 20.700000000000003" pathFrom="M -1 45L -1 45L 9 45L 18 45L 27 45L 36 45L 45 45L 54 45L 63 45L 72 45L 81 45L 90 45"></path><g id="SvgjsG1665" class="apexcharts-series-markers-wrap"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1685" r="0" cx="0" cy="0" class="apexcharts-marker wz4q8s84y no-pointer-events" stroke="#ffffff" fill="#ffbe0b" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g><g id="SvgjsG1666" class="apexcharts-datalabels"></g></g></g><line id="SvgjsLine1680" x1="0" y1="0" x2="90" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1681" x1="0" y1="0" x2="90" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1682" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1683" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1684" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1658" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect><g id="SvgjsG1675" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)"><g id="SvgjsG1676" class="apexcharts-yaxis-texts-g"></g></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip dark"><div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 190, 11);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                                                <span class="text-danger font-weight-bold font-size-13"><i class="uil uil-arrow-down"></i> 5.05%</span>
                                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 91px; height: 67px;"></div></div><div class="contract-trigger"></div></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        </div>

                    </div>
                @elseif(\Auth::user()->tipo_usuario=="root")
                <br>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('assets/images/logo.jpg') }}" style="float: center; border-radius: 50%;" alt="" height="500" width="500" />
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            @include('flash::message')
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Vista principal</h1>
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
                                                    <h6 class="mb-0">Pagos retrasados: </h6>
                                                </div>
                                             
                                                <div class="form-group">
                                                    <!-- <label class="mb-0 text-primary">Pagar mes</label> -->
                                                    <h6 class="mb-0"><a href="#" style="width: 100% !important;" onclick="BMesesResidente('{{$residente->id}}')" class="btn btn-primary">Pagar</a></h6>
                                                </div>

                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="media p-3">
                                                <div class="media-body">
                                                    <span class="text-muted text-muted text-uppercase font-size-12 font-weight-bold">Multas asignadas</span>
                                                    <h6 class="mb-0">Total de multas: </h6>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <!-- <label class="mb-0 text-danger">Pagar multa</label> -->
                                                    <h6 class="mb-0"><a href="#" style="width: 100% !important; position: relative;" onclick="pagarMultasResidente()" class="btn btn-danger">Pagar</a></h6>
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if(\Auth::user()->tipo_usuario!="root")
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Notificaciones
                                
                            </div>
                            <div class="card-body">
                                <hr>
                                @foreach($notificaciones as $key)
                                @if(\Auth::user()->tipo_usuario=="Admin")
                                <h4>{{$key->titulo}}</h4>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p>{{$key->motivo}}</p>
                                        </div>
                                        <div class="col-md-5">
                                            <ul>
                                            @foreach($key->residentes as $key2)
                                                <li>{{ $key2->apellidos }},{{ $key2->nombres }} | RUT: {{ $key2->rut }}</li>
                                            @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="dropdown align-self-center float-right">
                                                <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="uil uil-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-177px, 20px, 0px);">
                                                    <!-- item-->
                                                    <!-- <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editarNotificacion"><i class="uil uil-edit-alt mr-2"></i>Editar</a> -->
                                                    <!-- item-->
                                                    <div class="dropdown-divider"></div>
                                                    <!-- item-->
                                                    <a href="{{ route('eliminarNotificacion', $key->id)}}" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <hr>
                                @elseif(\Auth::user()->tipo_usuario!=="Admin")
                                    @if($key->publicar=="Todos" || buscar_notificacion($residente->id,$key->id)>0)
                                    <h4>{{$key->titulo}}</h4>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p>{{$key->motivo}}</p>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="dropdown align-self-center float-right">
                                                <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="uil uil-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-177px, 20px, 0px);">
                                                    <!-- item-->
                                                    <!-- <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editarNotificacion"><i class="uil uil-edit-alt mr-2"></i>Editar</a> -->
                                                    <!-- item-->
                                                    <div class="dropdown-divider"></div>
                                                    <!-- item-->
                                                    <a href="{{ route('eliminarNotificacion', $key->id)}}" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <hr>
                                    @endif
                                @endif
                                @endforeach()
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    <a href="#" data-toggle="modal" data-target="#crearNotficacion" class="btn btn-success">Nueva</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Noticias
                                
                            </div>
                            <div class="card-body">
                                <hr>
                                @foreach($noticias as $key)
                                <h4>{{$key->titulo}}</h4>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p>{{$key->contenido }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="dropdown align-self-center float-right">
                                                <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="uil uil-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-177px, 20px, 0px);">
                                                    <!-- item-->
                                                    <!-- <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editarNoticia" ><i class="uil uil-edit-alt mr-2"></i>Editar</a> -->
                                                    <!-- item-->
                                                    <div class="dropdown-divider"></div>
                                                    <!-- item-->
                                                    <a href="{{ route('eliminarNoticia', $key->id)}}" class="dropdown-item text-danger"><i class="uil uil-trash mr-2"></i>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <hr>
                                @endforeach()
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    @if(\Auth::user()->tipo_usuario == 'Admin')
                                        <a href="#" data-toggle="modal" data-target="#crearNoticia" class="btn btn-success">Nueva</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width:250px;background:#fff;margin-left: 25px; margin-right: -25px;">
                @if(\Auth::user()->tipo_usuario == 'Admin')
                    <div class="card-header">
                        <strong class="text-dark" style="font-size: 20px;">Crear Anuncio</strong>
                        <a href="#" style="float: right" class="btn btn-success btn-sm" onclick="AnuncioCreate()"><strong>Crear</strong></a>
                    </div>
                @endif
                <div class="card-body">
                    @foreach($anuncios as $key)
                        @if(\Auth::user()->tipo_usuario == 'Admin')
                            <a href="#" style="border-radius: 50px; width: 28px; height: 28px; float: right;" onclick="EliminarAnuncio('{{$key->id}}')" class="btn btn-danger btn-sm">
                                x
                            </a>
                            <a href="#" style="border-radius: 50px; width: 28px; height: 28px; float: right;" onclick="EditarAnuncio('{{$key->id}}','{{$key->titulo}}','{{$key->descripcion}}','{{$key->url_img}}','{{$key->link}}')" class="btn btn-warning btn-sm">
                                e
                            </a>
                        @endif
                        <div onclick="window.open('{{$key->link}}', '_blank');">
                            
                            <span class="text-dark"><strong>{{$key->titulo}}</strong></span>
                            <img class="imagenAnun text-dark" src="{{ asset($key->url_img) }}" width="250" height="200">

                            <p class="text-dark">{{$key->descripcion}}</p>
                        </div>

                        <hr>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>

@endif


    <!-- -----------------------------------------------MODALES -------------------------------------->
    <form action="{{ route('noticias.store') }}" method="POST" name="registrar_noticia" data-parsley-validate>
        @csrf
        <div class="modal fade" id="crearNoticia" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nueva Noticia</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="form-group">
                                    <input type="text" name="titulo" placeholder="Título" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="contenido" placeholder="Contenido" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" >Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('notificaciones.store') }}" method="POST" name="registrar_notificacion" data-parsley-validate>
        @csrf
        <div class="modal fade" id="crearNotficacion" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nueva Notificación</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="form-group">
                                    <input type="text" name="titulo" required="required" placeholder="Título" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="motivo" required="required" placeholder="Motivo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="checkbox" name="todos" onchange="bloquear(this)" id="todos"  data-toggle="tooltip" data-placement="top" checked="checked" title="Seleccione si desea que la notificación sea para todos" >
                                    <label for="todos">Para Todos</label>
                                    
                                    <select name="id_residente" disabled="disabled" id="id_residente" multiple="multiple" class="form-control select2">
                                        <option value="#" disabled="disabled">Seleccione El/Los Residente(s)</option>
                                        @foreach($residentes as $key)
                                        <option value="{{ $key->id }}"> {{ $key->apellidos }}, {{ $key->nombres }} - RUT: {{ $key->rut }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" >Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

     {!! Form::open(['route' => ['anuncios.update',1], 'enctype' => 'multipart/form-data', 'method' => 'PUT', 'name' => 'editar_anunc', 'id' => 'editar_anunc', 'data-parsley-validate']) !!}
            @csrf
            <div class="modal fade" id="editarAnuncio" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar anuncio</h4>                
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Título del anuncio</label>
                                        <input type="text" id="tituloAnunE" class="form-control" placeholder="Ej: Nuevos modelos de autos" name="titulo" required>
                                    </div>
                                </div>
                           
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="url" id="urlAnunE" placeholder="Ej: https://www.google.co.ve/" class="form-control" name="link" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea id="descripAnunE" placeholder="Ej: ¡Con nuevos repuestos traidos desde Suiza!..." class="form-control" name="descripcion" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Imagen</label>
                                        <div id="mostrarImagenEditar" align="center"></div>
                                        <input id="imagenAnunE" type="file" class="form-control" id="example-fileinput" name="imagen">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="id_anuncio" required id="idAnuncioE">
                            <div class="float-right">
                                <button type="submit" class="btn btn-success" >Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}




        {!! Form::open(['route' => ['anuncios.destroy',1033], 'method' => 'DELETE']) !!}
            @csrf
            <div class="modal fade" id="eliminarAnuncio" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Eliminar anuncio</h4>                
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>¿Está seguro de querer eliminar el anuncio? Esta opción no se podrá deshacer</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id" required id="idAnuncio">
                                    </div>
                                </div>
                            </div>

                            <div class="float-right">
                                <button type="submit" class="btn btn-danger" >Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}


@endsection
<script type="text/javascript">
    function bloquear(event) {
        
        if($('input:checkbox[name=todos]').is(':checked')) { 
            console.log('chequeado');
            $('#id_residente').attr('disabled', true);
        } else {  
            console.log('no chequeado');
            $('#id_residente').removeAttr('disabled');
        }
   
    }
</script>

@section('scripts')
    <script>
    $(function () {
      $('select').each(function () {
        $(this).select2({
          theme: 'bootstrap4',
          width: 'style',
          placeholder: $(this).attr('placeholder'),
          allowClear: Boolean($(this).data('allow-clear')),
        });
      });
    
    });
    </script>
@endsection


