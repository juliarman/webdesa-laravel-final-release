@extends('layouts.app')

@section('title')
    @foreach ($profile as $item)
        Selamat Datang Di {{ $item->nama_desa }}
    @endforeach
@endsection


@section('meta-seo')

    @foreach ($profile as $itemProfile)
        <meta property="og:type" content="website">
        <meta property="og:title" content="Website Official {{ $itemProfile->nama_desa }}">
        <meta property="og:image" content="{{ asset('assets/images/thumbnail-home.jpg') }}">
        <meta property="og:description" content="{{ $itemProfile->deskripsi }}">
        <meta property="og:url" content="{{ $itemProfile->url }}">

    @endforeach

@endsection

@section('slider')

    <div class="nivo-slider">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">

                @foreach ($slide as $itemSlide)
                    <img src="{{ $itemSlide->url }}" alt="Gambar Slide" />
                @endforeach

            </div>
        </div>
    </div>

    <div class="str9 str_wrap bg-dark">
        @foreach ($profile as $itemProfile)
            <h5 class="p-3 text-light">{{ $itemProfile->welcome }}
            </h5>
        @endforeach
    </div>

    <script>
        $(window).load(function() {
            $('.str9').liMarquee({
                direction: 'left'
            });
        })
    </script>


@endsection


{{-- @section('nav-menu')
    <div class="background" style="background: #032739">
        <div class="container container-menu">
            <nav class="navbar navbar-expand-lg navbar-menu">
                <div class="container">
                    <div class="navbar-collapse">
                        <ul class="navbar-nav">
                            <a href="{{ url('/surat') }}" class="nav-bottom">
                                <li class="nav-item">
                                    <div class="col-md-15 nav-middle text-center m-3 p-1    ">
                                        <h6 class="title-menu-1">SURAT ONLINE</h6>
                                        <h6 class="title-menu-2">Layanan Surat Online</h6>
                                    </div>
                                </li>
                            </a>


                            <a href="#" class="nav-bottom">
                                <li class="nav-item">
                                    <div class="col-md-15 nav-middle text-center m-3 p-1    ">
                                        <h6 class="title-menu-1">KABAR DESA</h6>
                                        <h6 class="title-menu-2">Berita & Informasi Desa</h6>
                                    </div>
                                </li>
                            </a>


                            <a href="#" class="nav-bottom">
                                <li class="nav-item">
                                    <div class="col-md-15 nav-middle text-center m-3 p-1    ">
                                        <h6 class="title-menu-1">KABAR DESA</h6>
                                        <h6 class="title-menu-2">Berita & Informasi Desa</h6>
                                    </div>
                                </li>
                            </a>


                            <a href="#" class="nav-bottom">
                                <li class="nav-item">
                                    <div class="col-md-15 nav-middle text-center m-3 p-1    ">
                                        <h6 class="title-menu-1">KABAR DESA</h6>
                                        <h6 class="title-menu-2">Berita & Informasi Desa</h6>
                                    </div>
                                </li>
                            </a>


                            <a href="#" class="nav-bottom">
                                <li class="nav-item">
                                    <div class="col-md-15 nav-middle text-center m-3 p-1    ">
                                        <h6 class="title-menu-1">KABAR DESA</h6>
                                        <h6 class="title-menu-2">Berita & Informasi Desa</h6>
                                    </div>
                                </li>
                            </a>

                            <a href="#" class="nav-bottom">
                                <li class="nav-item">
                                    <div class="col-md-15 nav-middle text-center m-3 p-1    ">
                                        <h6 class="title-menu-1">KABAR DESA</h6>
                                        <h6 class="title-menu-2">Berita & Informasi Desa</h6>
                                    </div>
                                </li>
                            </a>









                        </ul>
                    </div>
                </div>
            </nav>


        </div>
    </div>
@endsection --}}

@section('main-menu')




    {{-- {{ $dataCount->getAge() }} --}}


    <div class="container">
        <div class="row justify-content-center mt-3">
            <h3 class="text-center mt-3">MENU PILIHAN</h3>
        </div>
    </div>

    <div class="container mt-2" style="background-image: url({{ url('assets/images/background-menu.png') }})">

        <div class="row text-center d-flex justify-content-between ">

            <div class="col-md-2 mt-3 mb-2 menu-home">
                <a href="{{ url('/bansos') }}">
                    <img src="{{ asset('assets/images/berita.png') }}" alt="">
                    <h4 class=" mt-3 text-uppercase title-menu"><b>Bantuan Sosial</b></h4>
                    <p class="fs-6 title-menu">Fitur pengecekan penerima dana / sembako bansos</p>
                </a>
            </div>


            <div class="col-md-2 mt-3 mb-2 menu-home">
                <a href="{{ url('/surat') }}">
                    <img src="{{ asset('assets/images/surat.png') }}" alt="">
                    <h4 class=" mt-3 text-uppercase title-menu"><b>SURAT ONLINE</b></h4>
                    <p class="fs-6 title-menu">Layanan persuratan yang di sajikan secara online</p>
                </a>
            </div>

            <div class="col-md-2 mt-3 mb-2 menu-home">
                <a href="{{ url('/bumdes') }}">
                    <img src="{{ asset('assets/images/bumdes.png') }}" alt="">
                    <h4 class=" mt-3 text-uppercase title-menu"><b>BUMDES</b></h4>
                    <p class="fs-6 title-menu">Badan Usaha Milik Desa (BUMDES)</p>
                </a>
            </div>
            <div class="col-md-2 mt-3 mb-2 menu-home">
                <a href="{{ url('/pengaduan') }}">
                    <img src="{{ asset('assets/images/pengaduan.png') }}" alt="">
                    <h4 class="mt-3 text-uppercase title-menu"><b>FITUR PENGADUAN</b></h4>
                    <p class="fs-6 title-menu">Layanan untuk melakukan pengaduan secara online</p>
                </a>
            </div>
            <div class="col-md-2 mt-3 mb-2 menu-home">
                <a href="{{ url('/visi-misi') }}">
                    <img src="{{ asset('assets/images/visimisi.png') }}" alt="">
                    <h4 class="mt-3 text-uppercase title-menu"><b>VISI & MISI</b></h4>
                    <p class="fs-6 title-menu">Visi & Misi yang ingin di capai desa Sukamaju</p>
                </a>
            </div>


        </div>
    </div>

@endsection


@section('content-dashboard')

    <div class="col-lg-8 mb-3">

        <div class="card bg-white rounded shadow-sm woah fadeIn">
            @foreach ($headlineBerita as $itemHeadBerita)
                <img src="{{ $itemHeadBerita->getImages() }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title"><b>{{ $itemHeadBerita->judul }}</b></h3>
                    <div class="publication-details mt-2 mb-2">
                        <a href="#" class="author mr-2"><i
                                class="fas fa-user mr-2"></i>{{ $itemHeadBerita->users->name }}</a>
                        <span class="date"><i
                                class="fas fa-calendar-alt mr-2"></i>{{ $itemHeadBerita->created_at->translatedFormat('l jS F Y') }}</span>
                    </div>
                    <p class="card-text">{!! Str::limit($itemHeadBerita->isi_konten, 180) !!}</p>
                    <a href="/berita/{{ $itemHeadBerita->berita_id }}/{{ $itemHeadBerita->slug }}"
                        class="btn btn-success text-light">Baca
                        Selengkapnya</a>
                </div>
            @endforeach
        </div>



        <div class="card mt-3 shadow-sm">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-header bg-blue">
                        <h3 class="text-light mt-2">BERITA TERBARU</h3>
                    </div>
                </div>
            </div>


            <div class="row ml-0 mt-0 mr-0">

                @foreach ($headlineBerita as $itemBerita)
                    <div class="col-md-6 p-0">
                        <div class="card bg-white rounded woah fadeIn">
                            <div class="img-post">
                                <div class="inner">
                                    <img class="card-img-top resize" src="{{ $itemBerita->getImages() }}" height="200"
                                        alt="Card image cap">

                                </div>
                            </div>
                            <div class="card-body">

                                <a href="/berita/{{ $itemBerita->berita_id }}/{{ $itemBerita->slug }}">
                                    <h3 class="card-text">{{ $itemBerita->judul }}</h3>
                                </a>
                                <div class="detail-berita mb-1 mt-3">
                                    <a href="#" class="author mr-2"><i
                                            class="fas fa-user mr-2"></i>{{ $itemBerita->users->name }}</a>
                                    <span class="date"><i
                                            class="fas fa-calendar-alt mr-2"></i>{{ $itemBerita->created_at->translatedFormat('l jS F Y') }}
                                    </span>
                                </div>
                            </div>
                            {{-- <div class="card-footer bg-white">
                                <a href="{{ url('/berita/' . $itemBerita->berita_id) }}" class="text-link-berita">
                                    <h6><b>Baca Selengkapnya</b></h6>
                                </a>
                            </div> --}}
                        </div>
                    </div>


                @endforeach


                <div class="col-md-6 p-0 m-0">

                    @foreach ($berita as $itemBerita)

                        <div class="card p-3 card-list-berita border-top">
                            <div class="card-body p-0 m-0">
                                <div class="detail-berita mb-1 mt-1">
                                    <a href="#" class="author mr-2"><i
                                            class="fas fa-user mr-2"></i>{{ $itemBerita->users->name }}</a>
                                    <span class="date"><i
                                            class="fas fa-calendar-alt mr-2"></i>{{ $itemBerita->created_at->translatedFormat('l jS F Y') }}
                                    </span>
                                </div>
                                <a href="/berita/{{ $itemBerita->berita_id }}/{{ $itemBerita->slug }}">
                                    <p>{{ $itemBerita->judul }}</p>
                                </a>
                            </div>
                        </div>
                        <hr class="p-0 m-0">

                    @endforeach














                </div>







            </div>
            {{-- <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{ $berita->previousPageUrl() }}"
                            id="custom-paging-previous">Sebelumnya</a>
                    </li>


                    <li class="page-item"><a class="page-link" href="{{ $berita->nextPageUrl() }}"
                            id="custom-paging-next">Selanjutnya</a>
                    </li>
                </ul>
            </nav> --}}
            <div class="card-footer p-3">
                <a href="{{ url('/berita') }}">
                    <button class="btn btn-dark">LIHAT LEBIH BANYAK BERITA</button>
                </a>

            </div>
        </div>



        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card-header bg-blue">
                    <h3 class="text-light mt-2">STATISTIK PENDUDUK</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-15 mb-3 mt-3">

            <div class="card bg-white rounded shadow-sm">
                <canvas id="penduduk"></canvas>
                <script>
                    var ctx = document.getElementById('penduduk').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Laki-laki', 'Perempuan', 'Laki-laki & Perempuan'],
                            datasets: [{
                                label: '# Data Penduduk',
                                data: [{{ $countPria }}, {{ $countPerempuan }},
                                    {{ $countPria + $countPerempuan }}
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>

            </div>
        </div>











    </div>

    @include('includes.sidebar', [
    'dataSidebar'=> $data,
    'dataNomor'=> $nopenting,
    'dataProfile' => $profile,

    ])

@endsection



@section('populasi')


    <div class="container-fluid p-3">
        <h2 class="text-center p-2 mt-4 mb-2 text-light">POPULASI PENDUDUK</h2>
        <div class="row justify-content-center p-3">

            <div class="col-sm-2 m-3 shadow align-self-center" data-aos="flip-left">
                <div class="row ">
                    <div class="col-sm-5">
                        <i class="fas fa-baby-carriage text-primary fa-4x"></i>
                    </div>
                    <div class="col-sm-7 text-center">
                        @php($hitung = 0)

                        @foreach ($dateCountAge as $itemCount)


                            @if ($itemCount->tgl_lahir->age < 1)


                                @php($hitung++)
                            @endif

                        @endforeach
                        <h4 class="text-primary">BAYI</h4>
                        <h1 class="text-light">{{ $hitung }}</h1>
                    </div>
                </div>
            </div>


            <div class="col-sm-2 m-3 shadow align-self-center" data-aos="flip-left">
                <div class="row ">
                    <div class="col-sm-5">
                        <i class="fas fa-baby text-primary fa-4x"></i>
                    </div>
                    <div class="col-sm-7 text-center">
                        @php($hitung = 0)

                        @foreach ($dateCountAge as $itemCount)


                            @if ($itemCount->tgl_lahir->age > 1 && $itemCount->tgl_lahir->age <= 5)

                                @php($hitung++)
                            @endif

                        @endforeach
                        <h4 class="text-primary">BALITA</h4>
                        <h1 class="text-light">{{ $hitung }}</h1>
                    </div>
                </div>
            </div>


            <div class="col-sm-2 m-3 shadow align-self-center" data-aos="flip-left">
                <div class="row ">
                    <div class="col-sm-5">
                        <i class="fas fa-child text-primary fa-4x"></i>
                    </div>
                    <div class="col-sm-7 text-center">
                        @php($hitung = 0)

                        @foreach ($dateCountAge as $itemCount)


                            @if ($itemCount->tgl_lahir->age > 5 && $itemCount->tgl_lahir->age <= 13)

                                @php($hitung++)
                            @endif

                        @endforeach
                        <h4 class="text-primary">ANAK-ANAK</h4>
                        <h1 class="text-light">{{ $hitung }}</h1>
                    </div>
                </div>
            </div>


            <div class="col-sm-2 m-3 shadow align-self-center" data-aos="flip-left">
                <div class="row ">
                    <div class="col-sm-5">
                        <i class="fas fa-male text-primary fa-4x"></i>
                    </div>
                    <div class="col-sm-7 text-center">
                        @php($hitung = 0)

                        @foreach ($dateCountAge as $itemCount)


                            @if ($itemCount->tgl_lahir->age > 13 && $itemCount->tgl_lahir->age <= 18)

                                @php($hitung++)
                            @endif

                        @endforeach
                        <h4 class="text-primary">REMAJA</h4>
                        <h1 class="text-light">{{ $hitung }}</h1>
                    </div>
                </div>
            </div>


            <div class="col-sm-2 m-3 shadow align-self-center" data-aos="flip-left">
                <div class="row ">
                    <div class="col-sm-5">
                        <i class="fas fa-baby text-primary fa-4x"></i>
                    </div>
                    <div class="col-sm-7 text-center">
                        @php($hitung = 0)

                        @foreach ($dateCountAge as $itemCount)


                            @if ($itemCount->tgl_lahir->age > 18 && $itemCount->tgl_lahir->age <= 60)

                                @php($hitung++)
                            @endif

                        @endforeach
                        <h4 class="text-primary">DEWASA</h4>
                        <h1 class="text-light">{{ $hitung }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 m-3 shadow align-self-center" data-aos="flip-left">
                <div class="row ">
                    <div class="col-sm-5">
                        <i class="fas fa-user-alt text-primary fa-4x"></i>
                    </div>
                    <div class="col-sm-7 text-center">
                        {{-- @foreach ($dateCountAge as $item)


                            {{ $item->tgl_lahir->age }}

                        @endforeach --}}

                        @php($hitung = 0)
                        @foreach ($dateCountAge as $itemCount)
                            {{-- {{ $itemCount->tgl_lahir->age }} --}}
                            @if ($itemCount->tgl_lahir->age > 60)
                                @php($hitung++)
                            @endif
                        @endforeach





                        {{-- @php($hitung = 0)

                        @foreach ($dataCount as $itemCount)



                            @if ($itemCount > 60)

                                @php($hitung++)
                            @endif

                        @endforeach --}}
                        <h4 class="text-primary">LANSIA</h4>
                        <h1 class="text-light">{{ $hitung }}</h1>
                    </div>
                </div>
            </div>




        </div>

    </div>
    </div>

@endsection


@section('album-index')




    <div class="row rounded mb-3 bg-blue justify-content-center">
        <h3 class="text-center p-2 mt-2 text-light">ALBUM DESA</h3>
    </div>
    <div class="row rounded  justify-content-center">

        <div class="col-md-12">

            <div class="row justify-content-center text-center">

                @foreach ($photo as $itemPhoto)



                    <div class="col-lg-6 mb-3 ">
                        <div class="card-body rounded shadow bg-light">

                            <div class="inner">
                                <img src="{{ $itemPhoto->image }}" alt="" id="imgAlbum" class="card-img-top resize"
                                    height="210">
                            </div>
                            <div class="card-body">
                                <div class="detail-berita mb-1">

                                    <span class="date"><i
                                            class="fas fa-calendar-alt mr-2"></i><b>{{ $itemPhoto->created_at->translatedFormat('l jS F Y') }}</b></span>
                                </div>
                                <p class="card-text text-center ">{{ $itemPhoto->album->deskripsi }}</p>

                                <a href="{{ $itemPhoto->image }}" data-lightbox="image-1"
                                    data-title="{{ $itemPhoto->album->deskripsi }}">
                                    <button type="button" class="btn btn-danger">
                                        LIHAT PHOTO
                                    </button>
                                </a>
                            </div>



                        </div>
                    </div>


                @endforeach

                <div class="row mb-3 mt-3 justify-content-center">
                    <a href="/album"><button type="button" class="btn btn-success">SELENGKAPNYA</button></a>
                </div>


            </div>













        </div>


    </div>

@endsection



@section('pendidikan')


    <div class="container-fluid p-3">
        <h2 class="text-center p-2 mt-4 mb-4 text-dark">PENDIDIKAN</h2>
        <div class="container-fluid">
            <div class="row bg-dark">

                <div class="col-sm-4 bg-light">
                    <ul class="list-group">

                        <li class="list-group-item text-light  bg-blue" aria-current="true">Daftar Pendidikan</li>
                        @php($hitungPendidikan = 0)

                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'SD')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tamat SD / Sederajat
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>




                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'BELUM TAMAT SD')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">Belum Tamat SD /
                            Sederajat
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>



                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'SLTP')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">SLTP / Sederajat
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>


                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'SLTA')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">SLTA / Sederajat
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>


                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'DIPLOMA I')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">Diploma I
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>

                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'DIPLOMA II')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">Diploma II

                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>



                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'DIPLOMA III')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">Diploma III
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>



                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'DIPLOMA IV')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">Diploma IV
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>




                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'S1')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">Strata 1
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>




                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'S2')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">Strata II
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>


                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'S3')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">Strata III
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>



                        @php($hitungPendidikan = 0)
                        @foreach ($countPendidikan as $itemPendidikan)
                            @if ($itemPendidikan == 'TIDAK / BELUM SEKOLAH')
                                @php($hitungPendidikan++)
                            @endif
                        @endforeach
                        <li class="list-group-item d-flex justify-content-between align-items-center">Tidak / Belum Sekolah
                            <span class="badge bg-primary text-light rounded-pill">{{ $hitungPendidikan }}</span>
                        </li>


                    </ul>
                </div>
                <div class="col-sm-8 bg-light">


                    <div class="row d-flex justify-content-center">


                        <div class="card rounded  shadow m-2  justify-content-center text-center" style="width: 16rem;"
                            data-aos="flip-right">
                            <div class="card-header">
                                @php($hitungPendidikan = 0)

                                @foreach ($countPendidikan as $itemPendidikan)
                                    @if ($itemPendidikan == 'SD')
                                        @php($hitungPendidikan++)
                                    @endif
                                @endforeach
                                <h3 class="display-4 text-primary">{{ $hitungPendidikan }}</h3>
                            </div>
                            <img class="mx-auto mt-3" src="{{ asset('assets/images/sd.svg') }}" style="width: 100px"
                                alt="Pendidikan SD">
                            <div class="card-body">
                                <h5 class="card-title">Tamat SD / Sederajat
                                </h5>
                            </div>
                        </div>

                        <div class="card rounded  shadow m-2 justify-content-center text-center" style="width: 16rem;"
                            data-aos="flip-right">
                            <div class="card-header">
                                @php($hitungPendidikan = 0)
                                @foreach ($countPendidikan as $itemPendidikan)
                                    @if ($itemPendidikan == 'SLTP')
                                        @php($hitungPendidikan++)
                                    @endif
                                @endforeach
                                <h3 class="display-4 text-primary">{{ $hitungPendidikan }}</h3>
                            </div>
                            <img class="mx-auto mt-3" src="{{ asset('assets/images/smp.svg') }}" style="width: 100px"
                                alt="Pendidikan SD">
                            <div class="card-body">
                                <h5 class="card-title">SLTP / Sederajat
                                </h5>
                            </div>
                        </div>


                        <div class="card rounded  shadow m-2 justify-content-center text-center" style="width: 16rem;"
                            data-aos="flip-right">
                            <div class="card-header">
                                @php($hitungPendidikan = 0)
                                @foreach ($countPendidikan as $itemPendidikan)
                                    @if ($itemPendidikan == 'SLTA')
                                        @php($hitungPendidikan++)
                                    @endif
                                @endforeach

                                <h3 class="display-4 text-primary">{{ $hitungPendidikan }}</h3>
                            </div>
                            <img class="mx-auto mt-3" src="{{ asset('assets/images/sma.svg') }}" style="width: 100px"
                                alt="Pendidikan SD">
                            <div class="card-body">
                                <h5 class="card-title">SLTA / Sederajat
                                </h5>
                            </div>
                        </div>


                        <div class="card rounded  shadow m-2 justify-content-center text-center" style="width: 16rem;"
                            data-aos="flip-right">
                            <div class="card-header">

                                @php($hitungPendidikan = 0)

                                @foreach ($countPendidikan as $itemPendidikan)
                                    @if ($itemPendidikan == 'DIPLOMA IV')
                                        @php($hitungPendidikan++)
                                    @endif
                                @endforeach
                                <h3 class="display-4 text-primary">{{ $hitungPendidikan }}</h3>
                            </div>
                            <img class="mx-auto mt-3" src="{{ asset('assets/images/diploma.svg') }}"
                                style="width: 100px" alt="Pendidikan SD">
                            <div class="card-body">
                                <h5 class="card-title">Diploma IV
                                </h5>
                            </div>
                        </div>


                        <div class="card rounded  shadow m-2 justify-content-center text-center" style="width: 16rem;"
                            data-aos="flip-right">
                            <div class="card-header">
                                @php($hitungPendidikan = 0)
                                @foreach ($countPendidikan as $itemPendidikan)
                                    @if ($itemPendidikan == 'S1')
                                        @php($hitungPendidikan++)
                                    @endif
                                @endforeach

                                <h3 class="display-4 text-primary">{{ $hitungPendidikan }}</h3>
                            </div>
                            <img class="mx-auto mt-3" src="{{ asset('assets/images/sarjana1.png') }}"
                                style="width: 100px" alt="Pendidikan SD">
                            <div class="card-body">
                                <h5 class="card-title">Strata I
                                </h5>
                            </div>
                        </div>
                        <div class="card rounded  shadow m-2 justify-content-center text-center" style="width: 16rem;"
                            data-aos="flip-right">
                            <div class="card-header">
                                @php($hitungPendidikan = 0)
                                @foreach ($countPendidikan as $itemPendidikan)
                                    @if ($itemPendidikan == 'TIDAK / BELUM SEKOLAH')
                                        @php($hitungPendidikan++)
                                    @endif
                                @endforeach
                                <h3 class="display-4 text-primary">{{ $hitungPendidikan }}</h3>
                            </div>
                            <img class="mx-auto mt-3" src="{{ asset('assets/images/noschool.png') }}"
                                style="width: 100px" alt="Pendidikan SD">
                            <div class="card-body">
                                <h5 class="card-title">Tidak / Belum Sekolah
                                </h5>
                            </div>
                        </div>


                    </div>




                </div>

            </div>
        </div>

    </div>
    </div>

@endsection


@section('album-index')




    <div class="row rounded mb-3 bg-blue justify-content-center">
        <h3 class="text-center p-2 mt-2 text-light">ALBUM DESA</h3>
    </div>
    <div class="row rounded  justify-content-center">

        <div class="col-md-12">

            <div class="row justify-content-center text-center">

                @foreach ($photo as $itemPhoto)



                    <div class="col-lg-6 mb-3 ">
                        <div class="card-body rounded shadow bg-light">

                            <div class="inner">
                                <img src="{{ $itemPhoto->image }}" alt="" id="imgAlbum" class="card-img-top resize"
                                    height="210">
                            </div>
                            <div class="card-body">
                                <div class="detail-berita mb-1">

                                    <span class="date"><i
                                            class="fas fa-calendar-alt mr-2"></i><b>{{ $itemPhoto->created_at->translatedFormat('l jS F Y') }}</b></span>
                                </div>
                                <p class="card-text text-center ">{{ $itemPhoto->album->deskripsi }}</p>

                                <a href="{{ $itemPhoto->image }}" data-lightbox="image-1"
                                    data-title="{{ $itemPhoto->album->deskripsi }}">
                                    <button type="button" class="btn btn-danger">
                                        LIHAT PHOTO
                                    </button>
                                </a>
                            </div>



                        </div>
                    </div>


                @endforeach

                <div class="row mb-3 mt-3 justify-content-center">
                    <a href="/album"><button type="button" class="btn btn-success">SELENGKAPNYA</button></a>
                </div>


            </div>













        </div>


    </div>

@endsection






@section('aparatur')
    <div class="container-fluid mb-4">
        @include('includes.aparatur')
    </div>
@endsection
