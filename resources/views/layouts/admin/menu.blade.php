<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
<div class="sidebar-content">
    <!--- Sidemenu -->
    <div id="sidebar-menu" class="slimscroll-menu">
        <ul class="metismenu" id="menu-bar">
            <li class="menu-title">About</li>

            <li>
                <a href="{{ url('home') }}">
                    <i data-feather="home"></i>
                    <span> Escritorio </span>
                </a>
            </li>

            <!-- <li>
                <a href="#">
                    <i data-feather="bell"></i>
                    <span> Notificaciones </span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i data-feather="twitch"></i>
                    <span> Noticias </span>
                </a>
            </li> -->

            <li>
                <a href="#">
                    <i data-feather="truck"></i>
                    <span> Productos y servicios </span>
                </a>
            </li>

            <li>
                <a href="#">
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

            <li class="menu-title">Pagos </li>

            <li>
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span> Pagos </span>
                </a>
            </li>

            <li>
                <a href="{{ url('mensualidades') }}">
                    <i data-feather="credit-card"></i>
                    <span> Mensualidades </span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i data-feather="dollar-sign"></i>
                    <span> Multas y recargas </span>
                </a>
            </li>

            <li class="menu-title">Configuración </li>
            
            <li>
                <a href="angular-doc.html">
                    <i data-feather="users"></i>
                    <span> Usuarios </span>
                </a>
            </li>

            <li>
                <a href="laravel-doc.html">
                    <i data-feather="user"></i>
                    <span> Ver perfil </span>
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i data-feather="power"></i>
                    <span> Salir </span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
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


