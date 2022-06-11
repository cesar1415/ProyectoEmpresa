<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    {!! Html::style('vendors/iconfonts/font-awesome/css/all.min.css') !!}
    {!! Html::style('vendors/css/vendor.bundle.base.css') !!}
    {!! Html::style('vendors/css/vendor.bundle.addons.css') !!}
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {!! Html::style('css/style.css') !!}
    @yield('styles')
    <!-- endinject -->

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ route('home') }}"><img
                        src="{{ asset('images/logo.svg') }}" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="{{ asset('images/logo.svg') }}"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="fas fa-bars"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">
                    @yield('create')
                    <li class="nav-item nav-profile dropdown">

                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{ asset('images/faces/face16.jpg') }}" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="fas fa-cog text-primary"></i>
                                Configuración
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="tooltip"
                                data-placement="top" title="" data-original-title="Logout" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt text-primary"></i>
                                Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @yield('options')
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="fas fa-bars"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">



            @yield('preference')
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('layouts._nav')
            <!-- partial -->
            <div class="main-panel">
                @if (session()->has('message'))
                    <div class="row d-flex justify-content-center">
                        <div class="col-10">
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        </div>
                    </div>
                @endif
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->


                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            Todos los derechos reservados.</span>

                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    {!! Html::script('vendors/js/vendor.bundle.base.js') !!}
    {!! Html::script('vendors/js/vendor.bundle.addons.js') !!}
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    {!! Html::script('js/off-canvas.js') !!}
    {!! Html::script('js/hoverable-collapse.js') !!}
    {!! Html::script('js/misc.js') !!}
    {!! Html::script('js/settings.js') !!}
    {!! Html::script('js/todolist.js') !!}



    <!-- endinject -->
    <!-- Custom js for this page-->
    {!! Html::script('js/dashboard.js') !!}
    <!-- End custom js for this page-->
    @yield('scripts')

</body>


</html>
