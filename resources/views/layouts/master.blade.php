<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Easy Bike Management Application </title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">

    {{--all header links goes here--}}
    @yield('header-links')
</head>
<body class="hold-transition sidebar-mini">
<div id="preview_img"></div>
<div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">Easy Bike Management</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://dummyimage.com/60x60/000/fff" alt="img" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    {{--dashboard--}}
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link {{ isset($page) ? ($page == 'dashboard' ? 'active has-treeview' : '') : '' }}">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    {{--owner dropdown menu--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ isset($page) ? ($page == 'owner' ? 'active has-treeview' : '') : ''}}">
                            <i class="fas fa-users"></i>
                            <p>
                                Owners
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{route('owner.create')}}" class="nav-link">
                                    <i class="fas fa-circle"></i>
                                    <p>New Owner</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('owner.index')}}" class="nav-link">
                                    <i class="fas fa-circle"></i>
                                    <p>All Owners</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--end dropdown--}}

                    {{--Driver dropdown menu--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ isset($page) ? ($page == 'driver' ? 'active ' : '') : '' }}">
                            <i class="fas fa-car"></i>
                            <p>
                                Drivers
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="{{route('driver.create')}}" class="nav-link">
                                    <i class="fas fa-circle"></i>
                                    <p>New Driver</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('driver.index')}}" class="nav-link">
                                   <i class="fas fa-circle"></i>
                                    <p>All Drivers</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--end dropdown--}}




                     {{--Printer dropdown menu--}}
                    <li class="nav-item has-treeview">
                        <a href="{{ route('printer.index') }}" class="nav-link {{ isset($page) ? ($page == 'printer' ? 'active ' : '') : '' }}">
                            <i class="fas fa-print"></i>
                            <p>
                                Print Card
                            </p>
                        </a>
                    </li>
                    {{--end dropdown--}}




                    {{--logout--}}
                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">

                            <p>
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    {{--All body contect goes here--}}
    @yield('content')


    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Design & Develop By <a href="https://linkingcc.com">LinkingCC</a>
        </div>
        <strong>Copyright &copy; 2018-2019 <a href="https://jessorepaurashava.org">Jashore Pourashava</a>.</strong> All
        rights reserved.
    </footer>
</div>

<!-- all javascripts -->
<script src="{{ asset('js/app.js')}}"></script>
<script src="{{ asset('js/dropzone.js')}}"></script>
<script src="{{ asset('js/dropzone-config.js')}}"></script>
<script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


{{--All footer script goes here--}}
@yield('footer-scripts')

</body>
</html>
