@extends('pages.administrator.layout')


@section('main-content')


    <div class="container">
        <div class="card card-body">
            <h1 style="color: #28a745">SURAT ONLINE DESA</h1>
            <p class="lead">List Permintaan Pembuatan Surat Online</p>
            @if (session('message'))
                <div data-dismiss="alert" class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>DITAMBAHKAN!</strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('status'))
                <div data-dismiss="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>DELETE!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('confirmation'))
                <div data-dismiss="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>SELESAI!</strong> {{ session('confirmation') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="modal fade" id="modalListJenisSurat" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">LIST JENIS SURAT</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                @foreach ($jsurat as $itemJsurat)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $itemJsurat->jenis_surat }}
                                        <span class="badge">
                                            <form action="/surat-admin/{{ $itemJsurat->jsurat_id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-danger m-1">Hapus</button>
                                            </form>
                                        </span>
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    </div>
                </div>
            </div>


            <form action="/surat-admin" method="post">
                {{ csrf_field() }}
                <!-- MODAL ADD JENIS SURAT -->
                <div class="modal fade" id="modalAddJenisSurat" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">TAMBAH JENIS SURAT</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">JENIS SURAT</span>
                                    <input type="text" class="form-control" name="jenis_surat" aria-label="Jenis Surat"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TUTUP</button>
                                <button type="submit" class="btn btn-success"
                                    onclick="return confirm('Anda yakin ingin menyimpan data ini?')">SIMPAN DATA</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>





            <div class="row justify-content-start">
                <div class="col-lg-3">
                    <button class="btn btn-success mr-2 mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalAddJenisSurat">TAMBAHKAN
                        JENIS SURAT<i class="fa fa-calendar-alt m-2"></i></button>
                </div>
                <div class="col-lg-4">
                    <button class="btn btn-info mr-2 mb-3" data-bs-toggle="modal" data-bs-target="#modalListJenisSurat">LIST
                        JENIS SURAT
                        JENIS SURAT<i class="fa fa-calendar-alt m-2"></i></button>
                </div>
            </div>




            <div class="table-responsive">
                <table class="table table-hover bg-white">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>

                            <th scope="col">No HP</th>
                            <th scope="col">Jenis Surat</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($surat as $itemSurat => $listSurat)
                            <tr class="text-center">
                                <th scope="row">

                                    {{ $surat->firstItem() + $itemSurat }}

                                </th>
                                <td>{{ $listSurat->nama }}</td>

                                <td>{{ $listSurat->no_hp }}</td>
                                <td>{{ $listSurat->jenis_surat }}</td>

                                @if ($listSurat->status == 'Belum Diproses')
                                    <td class="text-danger">{{ $listSurat->status }}</td>
                                @elseif($listSurat->status == 'Telah Diproses')
                                    <td class="text-success">{{ $listSurat->status }}</td>
                                @endif

                                <td>
                                    <div class="btn-group">

                                        <a href="/surat-admin/lihat/{{ $listSurat->surat_id }}"> <button type="button"
                                                class="btn btn-success m-1">Lihat</button></a>

                                        <form action="/surat-admin/delete/{{ $listSurat->surat_id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                class="btn btn-danger m-1">Hapus</button>
                                        </form>

                                        <form action="/surat-admin/confirm/{{ $listSurat->surat_id }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @if ($listSurat->status == 'Belum Diproses')
                                                <button type="submit" onclick="return confirm('Tandai sebagai selesai?')"
                                                    class="btn btn-warning m-1">Tandai Selesai</button>
                                            @elseif($listSurat->status == 'Telah Diproses')
                                                <button type="submit" disabled
                                                    onclick="return confirm('Tandai sebagai selesai?')"
                                                    class="btn btn-info m-1">Selesai</button>
                                            @endif
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>


                </table>
                <small class="d-block text-end mt-2 justify-content-start d-flex">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $surat->previousPageUrl() }}"
                                    id="custom-paging-previous">Sebelumnya</a>
                            </li>


                            <li class="page-item"><a class="page-link" href="{{ $surat->nextPageUrl() }}"
                                    id="custom-paging-next">Selanjutnya</a>
                            </li>
                        </ul>
                    </nav>
                </small>
            </div>







        </div>

    </div>


@endsection
