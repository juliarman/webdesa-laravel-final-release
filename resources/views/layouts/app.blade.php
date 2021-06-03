<!doctype html>
<html lang="en">

<head>


    @include('includes.head')

    <title>@yield('title')</title>
</head>

<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
            <div class="container main-container">
                @foreach ($profile as $itemProfile)
                    <a class="navbar-brand" href="/">
                        <img src="{{ $itemProfile->logo }}" style="width: 150px" alt="">
                    </a>
                @endforeach
                <button class="navbar-toggler" t.ype="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse mt-3 justify-content-end" id="navbarSupportedContent">


                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                        <li class="nav-item mr-4">
                            <a class="nav-link {{ '/' == request()->path() ? 'active' : '' }}"
                                href=" {{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item mr-4">
                            <a class="nav-link {{ 'agenda' == request()->path() ? 'active' : '' }}"
                                href="{{ url('/agenda') }}">Agenda</a>
                        </li>

                        <li class="nav-item mr-4">
                            <a class="nav-link {{ 'data-penduduk' == request()->path() ? 'active' : '' }}"
                                href="{{ url('/data-penduduk') }}">Data Penduduk</a>
                        </li>

                        <li class="nav-item mr-4">
                            <a class="nav-link {{ 'album' == request()->path() ? 'active' : '' }}"
                                href="{{ url('/album') }}">Album Desa</a>
                        </li>

                        <li class="nav-item mr-4">
                            <a class="nav-link {{ 'profile' == request()->path() ? 'active' : '' }}"
                                href="{{ url('/profile') }}">Profil</a>
                        </li>



                        <li class="nav-item mr-4">
                            <a class="nav-link {{ 'berita' == request()->path() ? 'active' : '' }}"
                                href="{{ url('/berita') }}">Berita</a>
                        </li>

                        <li class="nav-item mr-4 mt-1">
                            <a href="{{ url('/login') }}"><button type="button" class="btn btn-success"> Login
                                    Admin</button></a>
                        </li>

                    </ul>
                    {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mr-4">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="{{ url('/agenda') }}">Agenda</a>
                        </li>

                        <li class="nav-item mr-4">
                            <a class="nav-link" href="{{ url('/data-penduduk') }}">Data Penduduk</a>
                        </li>

                        <li class="nav-item mr-4">
                            <a class="nav-link" href="{{ url('/album') }}">Album Desa</a>
                        </li>

                        <li class="nav-item mr-4">
                            <a class="nav-link" href="#">Profil</a>
                        </li>



                        <li class="nav-item mr-4">
                            <a class="nav-link" href="#">Tentang</a>
                        </li>

                        <li class="nav-item mr-4 mt-1">
                            <a href="{{ url('/login') }}"><button type="button" class="btn btn-success"> Login
                                    Admin</button></a>
                        </li>

                    </ul> --}}

                </div>
            </div>
        </nav>
    </header>


    @yield('slider')



    {{-- @yield('nav-menu') --}}
    @yield('main-menu')
    @yield('breadcrumb')






    <div class="container main-container">
        <div class="row mt-4 mb-3">

            @yield('content-dashboard')

            @yield('content-sambutan')
            @yield('berita')
            @yield('profile')
            @yield('agenda')
            @yield('detail-penduduk')
            @yield('album')
            @yield('detail-album')
            @yield('detail-post')
            @yield('surat')
            @yield('penduduk')
            @yield('pengaduan')
            @yield('visi-misi')
            @yield('main-content');



        </div>



    </div>

    <div class="container main-container mb-4">
        @yield('album-index')
    </div>





    @yield('aparatur')



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth'
            });
            calendar.render();
        });

    </script>



    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider();
        });

    </script>

    {{-- {{ dd($beritanya) }} --}}

    @include('includes.footer',['dataBerita' => $beritanya,'dataAgenda' => $agenda, 'dataProfile' => $profile])

</body>

</html>
