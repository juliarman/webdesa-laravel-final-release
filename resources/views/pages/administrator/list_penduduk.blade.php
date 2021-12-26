@extends('pages.administrator.layout')

@section('main-content')


    <div class="container card card-body">


        <h1 class="___class_+?1___">List Data <span class="text-success">Penduduk</span></h1>
        <hr>

        <div class="row">

            <div class="col-lg-5">
                <form action="/list-penduduk" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan nama penduduk" name="pencarian"
                            aria-label="nama" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari Penduduk</button>
                    </div>
                </form>
            </div>

            {{-- <div class="col-lg-5">
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Download Data
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('data-penduduk') }}">Balita</a></li>
                        <li><a class="dropdown-item" href="#">Remaja</a></li>
                        <li><a class="dropdown-item" href="#">Dewasa</a></li>
                        <li><a class="dropdown-item" href="#">Semua Data Penduduk</a></li>

                    </ul>
                </div>
            </div> --}}

            @if (session('message'))
                <div data-dismiss="alert" class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>BERHASIL!</strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('status'))
                <div data-dismiss="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>TERHAPUS!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                </thead>
                <tbody>
                    <tr>

                        <th scope="col ">Nama</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">No NIK</th>
                        {{-- <th scope="col">Status</th> --}}
                        <th scope="col">Alamat</th>
                        {{-- <th scope="col">Keterangan</th> --}}
                        <th scope="col">Aksi</th>
                    </tr>


                    @if (count($penduduk))
                        @foreach ($penduduk as $itemPenduduk)

                            <tr>
                                <td>{{ $itemPenduduk->nama }}</td>
                                <td>{{ $itemPenduduk->pekerjaan }}</td>
                                <td>{{ $itemPenduduk->no_nik }}</td>



                                {{-- <td>
                                    @if ($itemPenduduk->status == 'Masih Hidup')
                                        <h6 class="text-success">{{ $itemPenduduk->status }}</h6>

                                    @elseif($itemPenduduk->status == 'Meninggal')

                                        <h6 class="text-danger">{{ $itemPenduduk->status }}</h6>
                                    @endif
                                </td> --}}


                                <td>{{ $itemPenduduk->alamat }}</td>



                                {{-- <td>
                                    @if ($itemPenduduk->keterangan == 'Pindah Datang')
                                        <h6 class="text-warning">{{ $itemPenduduk->keterangan }}</h6>
                                    @elseif($itemPenduduk->keterangan == 'Pindah Keluar')
                                        <h6 class="text-info">{{ $itemPenduduk->keterangan }}</h6>
                                    @elseif($itemPenduduk->keterangan == 'Warga Tetap')

                                        <h6 class="text-success">{{ $itemPenduduk->keterangan }}</h6>


                                    @elseif($itemPenduduk->keterangan == 'Tanpa Keterangan')

                                        <h6 class="text-dark">{{ $itemPenduduk->keterangan }}</h6>

                                    @endif
                                </td> --}}


                                <td>
                                    <div class="btn-group">
                                        <a href="/edit-penduduk/{{ $itemPenduduk->penduduk_id }}"> <button type="button"
                                                class="btn btn-success m-1">Edit</button></a>

                                        <form action="/list-penduduk/{{ $itemPenduduk->penduduk_id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                class="btn btn-danger m-1">Hapus</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>



                        @endforeach



                    @else


                        <div data-dismiss="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>DATA TIDAK ADA!</strong> Data Penduduk Tidak Ada Atau Belum Di Input!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                    @endif

                </tbody>
            </table>







        </div>


        {{ $penduduk->links('layouts.paginator') }}



        {{-- <small class="d-block text-end mt-2 justify-content-center d-flex">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{ $penduduk->previousPageUrl() }}"
                            id="custom-paging-previous">Sebelumnya</a>
                    </li>


                    <li class="page-item"><a class="page-link" href="{{ $penduduk->nextPageUrl() }}"
                            id="custom-paging-next">Selanjutnya</a>
                    </li>
                </ul>
            </nav>
        </small> --}}



    </div>


@endsection
