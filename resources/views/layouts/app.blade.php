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
                        <div class="row page-title">
                            <div class="col-md-12">
                                <h4 class="mb-1 mt-0">ControlApp <label class="badge badge-soft-danger">v1.0.1</label>
                                </h4>
                            </div>
                        </div>
                        <div>
                            
                            <app></app>
                        </div>
                        @yield('statusarea')
                        @yield('breadcomb')
                        @yield('content')
                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

            </div>


            
        </div>
    </div>
    

    @include('layouts.admin.footer')
    <!-- Scripts -->
        @include('layouts.scripts')
    @section('scripts')
    @endsection
</body>
</html>
