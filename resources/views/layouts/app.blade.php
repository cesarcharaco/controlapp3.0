<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ControlApp') }}</title>

    
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.jpg') }}">
    
    @include('layouts.css')

    

    <!-- <style type="text/css">
        
        }
    </style> -->
    
</head>
<body>
    <div id="app">
        <div class="" style="min-height: 100% !important; position: relative !important;">
            @include('layouts.admin.header')
            
            
            @include('layouts.admin.menu')
            


            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- <div class="row page-title">
                            <div class="col-md-12">
                                <h4 class="mb-1 mt-0">ControlApp <label class="badge badge-soft-danger">v1.0.1</label>
                                </h4>
                            </div>
                        </div> -->
                            
                            <app></app>
                            @yield('statusarea')
                            @yield('breadcomb')
                            @yield('content')




                            <form method="POST">
                                <div class="modal fade" id="AsignarMR" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Asignar M/R</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Multas - Recargas</label>
                                                        <select multiple class="form-control select2" name="id_multas[]">
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Residentes</label>
                                                        <select multiple class="form-control select2" name="id_residentes[]">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer border-bottom">
                                                <button type="submit" class="btn btn-success">Asignar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

            </div>


            
        </div>
    @include('layouts.admin.footer')
    </div>
    

    <!-- Scripts -->
        
        @include('layouts.scripts')
    @section('scripts')
    @endsection
</body>
</html>
