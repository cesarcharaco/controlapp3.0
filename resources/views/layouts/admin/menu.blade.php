<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
                <img src="{{ asset('assets/images/logo.jpg') }}" class="avatar-sm rounded-circle mr-2" alt="Shreyu">

                <div class="media-body">
                    <h6 class="pro-user-name mt-0 mb-0">Nik Patel</h6>
                    <span class="pro-user-desc">Administrator</span>
                </div>
                <div class="dropdown align-self-center profile-dropdown-menu">
                    <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <div class="dropdown-menu profile-dropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a href="#" class="dropdown-item notify-item" data-toggle="modal" data-target="#Profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user icon-dual icon-xs mr-2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="text-success">Mi perfil</span>
                        </a>

                        
                        <div class="dropdown-divider"></div>

                        <a href="javascript:void(0);" class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out icon-dual icon-xs mr-2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                            <span class="text-danger">Salir</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
<div class="sidebar-content">
    <!--- Sidemenu -->
    <div id="sidebar-menu" class="slimscroll-menu">
        <ul class="metismenu" id="menu-bar">

            <li class="menu-title">Funciones</li>

            <!-- <li>
                <a href="#">
                    <i data-feather="truck"></i>
                    <span> Productos </span>
                </a>
            </li> -->

            <li>
                <a href="{{ url('estacionamientos') }}">
                    <i data-feather="share"></i>
                    <span> Estacionamiento </span>
                </a>
            </li>

            <li>
                <a href="{{ url('inmuebles') }}">
                    <i data-feather="map"></i>
                    <span> Inmuebles </span>
                </a>
            </li>

            <li>
                <a href="{{ url('residentes') }}">
                    <i data-feather="users"></i>
                    <span> Residentes </span>
                </a>
            </li>

            <li>
                <a href="{{ url('arriendos') }}">
                    <i data-feather="key"></i>
                    <span> Arriendos </span>
                </a>
            </li>

            <li class="menu-title">Transacciones </li>

            <li>
                <a href="{{ url('pagos') }}">
                    <i data-feather="credit-card"></i>
                    <span> Pagos </span>
                </a>
            </li>

            <li>
                <a href="{{ url('multas_recargas')}}">
                    <i data-feather="dollar-sign"></i>
                    <span> Multas y recargas </span>
                </a>
            </li>
            <li>
                <a class="dropdown-item" onclick="asignar_mr()" data-toggle="modal" data-target="#AsignarMR">
                    <i data-feather="credit-card"></i>
                        <span> Asignar M/R </span>
                </a>
            </li>

            <li class="menu-title">Configuración </li>
            
            <li>
                <a href="angular-doc.html">
                    <i data-feather="users"></i>
                    <span> Usuarios </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
</div>
<!-- Sidebar -left -->

</div>


<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


