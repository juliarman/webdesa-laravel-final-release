@extends('layouts.app')

@section('penduduk')




    <div class="container card card-body">

        <h1 class="display-6">Data Penduduk</h1>
        <hr>

        <div class="row">

            <div class="col-lg-5">
                <form action="/data-penduduk" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan nama penduduk" name="pencarian"
                            aria-label="nama" aria-describedby="button-addon2">
                        <button class="btn btn-danger" type="submit" id="button-addon2">Cari Penduduk</button>
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
                        <th scope="col ">No</th>
                        <th scope="col ">Nama</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">No Handphone/WA</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>


                    @if (count($penduduk))
                        @foreach ($penduduk as $itemPenduduk => $penduduk)

                            <tr>
                                <td>{{ $itemPenduduk + 1 }}</td>
                                <td>{{ $penduduk->nama }}</td>
                                <td>{{ $penduduk->pekerjaan }}</td>
                                <td>{{ $penduduk->no_hp }}</td>
                                <td>{{ $penduduk->alamat }}</td>
                                <td> <a href="{{ url('/detail-penduduk/detail/' . $penduduk->penduduk_id) }}"> <button
                                            type="button" class="btn btn-success">Lihat Data</button>
                                </td></a>

                            </tr>



                        @endforeach

                    @else

                        <div class="alert alert-danger" role="alert">
                            Data penduduk tidak ada!
                        </div>

                    @endif

                </tbody>
            </table>





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
