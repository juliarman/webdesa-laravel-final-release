@extends('pages.administrator.layout')

@section('main-content')


    <div class="container card card-body">

        <h1 class="">List Data <span class="text-success">Penduduk</span></h1>
        <hr>

        <div class="row">

            <div class="col-lg-5">
                <form action="/list-penduduk" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan nama penduduk" name="pencarian"
                            aria-label="nama" aria-describedby="button-addon2">
                        <button class="btn btn-danger" type="submit" id="button-addon2">Cari Penduduk</button>
                    </div>
                </form>
            </div>

            @if (session('message'))

                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>

            @endif

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
                        @foreach ($penduduk as $itemPenduduk => $listPenduduk)

                            <tr>
                                <td>{{ $itemPenduduk + 1 }}</td>
                                <td>{{ $listPenduduk->nama }}</td>
                                <td>{{ $listPenduduk->pekerjaan }}</td>
                                <td>{{ $listPenduduk->no_hp }}</td>
                                <td>{{ $listPenduduk->alamat }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/edit-penduduk/{{ $listPenduduk->penduduk_id }}"> <button type="button"
                                                class="btn btn-success m-1">Edit</button></a>

                                        <form action="/list-penduduk/{{ $listPenduduk->penduduk_id }}" method="post"
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

                        <div class="alert alert-danger" role="alert">
                            Data penduduk tidak ada!
                        </div>

                    @endif

                </tbody>
            </table>

            <small class="d-block text-end mt-2 justify-content-center d-flex">
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
            </small>





        </div>




    </div>


@endsection
