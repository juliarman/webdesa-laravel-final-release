@extends('layouts.app')


@section('title', 'Data Penduduk | Halaman Data Penduduk')

@section('penduduk')




    <div class="container card card-body">

        <h1 class="display-6">Data Penduduk</h1>

        <p class="bg-light p-3"><small class="text-danger font-weight-bold">KETERANGAN:</small> Masukkan nama, no nik, no
            kk, tempat lahir,
            atau alamat
            untuk
            mencari
            data
            penduduk!</p>
        <hr>

        <div class="row">

            <div class="col-lg-5">
                <form action="/data-penduduk" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Pencarian...." name="pencarian"
                            aria-label="nama" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari Data Penduduk</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                </thead>
                <tbody>
                    <tr>

                        <th scope="col ">Nama</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">No Handphone/WA</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>


                    @if (count($penduduk))
                        @foreach ($penduduk as $itemPenduduk)
                            <tr>

                                <td>{{ $itemPenduduk->nama }}</td>
                                <td>{{ $itemPenduduk->pekerjaan }}</td>

                                @if ($itemPenduduk->no_hp != null)

                                    <td>{{ $itemPenduduk->no_hp }}</td>

                                @else
                                    <td>-Belum Diisi-</td>
                                @endif

                                <td>{{ $itemPenduduk->alamat }}</td>
                                <td> <a href="{{ url('/detail-penduduk/detail/' . $itemPenduduk->penduduk_id) }}"> <button
                                            type="button" class="btn btn-success">Lihat Data</button>
                                </td></a>
                            </tr>



                        @endforeach

                    @else

                        <div data-dismiss="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>DATA TIDAK ADA!</strong> Data Penduduk Tidak Ada Atau Belum Di Input!

                        </div>

                    @endif

                </tbody>
            </table>


            {{ $penduduk->links('layouts.paginator') }}


        </div>




        {{-- {{ $penduduk->links('pagination::bootstrap-4') }} --}}


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
