<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>


    <title>Admin Desa | Administrator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/limarquee/css/liMarquee.css') }}">

    <!--DATEPICKER -->

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}">
    <script src="{{ asset('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugin/fontawesome-free/css/all.css') }}">
    <!-- Theme style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>



    <link rel="stylesheet" href="{{ asset('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}">
    <script src="{{ asset('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>


    <style>
        .page-link {
            color: #28a745;
        }


        #custom-paging-next {
            color: #f9f9f9;
            background-color: #28a745;
        }


        #custom-paging-previous {
            color: #f9f9f9;
            background-color: #343a40;
        }

    </style>

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/logout') }}" class="nav-link btn btn-success text-light">LOG OUT</a>
                </li>

            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                {{-- <li class="nav-item dropdown"> --}}
                {{-- <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a> --}}
                {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('assets/admin/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('assets/admin/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('assets/admin/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div> --}}
                {{-- </li> --}}
                <!-- Notifications Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">WEB DESA</span>
            </a>



            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ auth()->user()->foto }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>




                        <li class="nav-item">
                            <a href="{{ url('/profil-desa') }}"
                                class="nav-link {{ 'profil-desa' == request()->path() ? 'active' : '' }}">
                                <i class="nav-icon fas fa-archway"></i>
                                <p>
                                    Profil Desa

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>
                                    Data Penduduk
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/list-penduduk') }}"
                                        class=" nav-link {{ 'list-penduduk' == request()->path() ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>List Penduduk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/input-penduduk') }}"
                                        class="nav-link {{ 'input-penduduk' == request()->path() ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-align-justify"></i>
                                        <p>Input Penduduk</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="{{ url('/surat-admin') }}"
                                class="nav-link {{ 'surat-admin' == request()->path() ? 'active' : '' }}">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Layanan Surat

                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ url('/agenda-admin') }}"
                                class="nav-link {{ 'agenda-admin' == request()->path() ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Agenda

                                </p>
                            </a>
                        </li>





                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Berita
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/tulis-berita') }}"
                                        class=" nav-link {{ 'tulis-berita' == request()->path() ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Tulis Berita</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/list-berita') }}"
                                        class="nav-link {{ 'list-berita' == request()->path() ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-align-justify"></i>
                                        <p>List Berita</p>
                                    </a>
                                </li>

                            </ul>
                        </li>





                        <li class="nav-item">
                            <a href="{{ url('/aparatur-desa') }}"
                                class="nav-link {{ 'aparatur-desa' == request()->path() ? 'active' : '' }}">
                                <i class="nav-icon fas fa-child"></i>
                                <p>
                                    Aparatur Desa

                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ url('/album-admin') }}"
                                class="nav-link {{ 'album-admin' == request()->path() ? 'active' : '' }}">
                                <i class="nav-icon fas fa-images"></i>
                                <p>
                                    Album

                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ url('/pengaduan-admin') }}"
                                class="nav-link {{ 'pengaduan-admin' == request()->path() ? 'active' : '' }}">
                                <i class="nav-icon fas fa-question"></i>
                                <p>
                                    Pengaduan

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/nomor-penting') }}"
                                class="nav-link {{ 'nomor-penting' == request()->path() ? 'active' : '' }}">
                                <i class="nav-icon fas fa-phone-square"></i>
                                <p>
                                    Nomor Penting
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/visimisi-admin') }}"
                                class="nav-link {{ 'visimisi-admin' == request()->path() ? 'active' : '' }}">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <p>
                                    Visi-Misi
                                </p>
                            </a>
                        </li>













                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title')</h1>
                        </div>
                        {{-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div> --}}
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            @yield('main-content')

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Development By</b> Juliarman Umar
            </div>
            <strong>Copyright &copy;2021 </strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/admin/plugin/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/admin/plugin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin/js/adminlte.min.js') }}"></script>


</body>

</html>
