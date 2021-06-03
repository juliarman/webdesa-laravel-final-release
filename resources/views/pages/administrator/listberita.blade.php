@extends('pages.administrator.layout')

@section('main-content')

    <div class="container">


        <div class="card card-body">

            <h1 style="color: #28a745">LIST BERITA</h1>
            <p class="lead">Halaman list Berita Desa</p>



            <div class="row justify-content-start">

                <form action="/list-berita" method="post">
                    {{ csrf_field() }}
                    <!-- MODAL ADD KATEGORI BERITA -->
                    <div class="modal fade" id="modalAddJenisSurat" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">TAMBAH KATEGORI BERITA</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">NAMA KATEGORI</span>
                                        <input type="text" class="form-control" name="nama_kategori"
                                            aria-label="Jenis Surat" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">DESKRIPSI KATEGORI</span>
                                        <textarea class="form-control" name="deskripsi"
                                            aria-label="With textarea"></textarea>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TUTUP</button>
                                    <button type="submit" class="btn btn-success"
                                        onclick="return confirm('Anda yakin ingin menyimpan data ini?')">SIMPAN
                                        DATA</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="col-lg-3">
                    <button class="btn btn-success mr-2 mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalAddJenisSurat">TAMBAH
                        KATEGORI BERITA<i class="fa fa-paperclip m-2"></i></button>
                </div>







                <div class="col-lg-3">
                    <button class="btn btn-warning mr-2 mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalListKategori">LIST KATEGORI BERITA<i class="fa fa-th-list m-2"></i></button>
                </div>

                <div class="modal fade" id="modalListKategori" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">LIST KATEGORI BERITA</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group">
                                    @foreach ($categories as $itemCategories)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $itemCategories->name }}
                                            <span class="badge">
                                                <form action="/list-berita/{{ $itemCategories->categories_id }}"
                                                    method="post" class="d-inline">
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


            </div>

            @if (session('message'))
                <div class="alert alert-primary">
                    {{ session('message') }}
                </div>
            @endif



            <div class="table-responsive">
                <table class="table table-hover bg-white">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Tanggal Publikasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($listBerita as $itemBerita => $listItemBerita)

                            <tr>
                                <th scope="row">{{ $itemBerita + 1 }}</th>
                                <td>{{ $listItemBerita->judul }}

                                    @if ($listItemBerita->status == 'Terbit')

                                        <span class="badge bg-success">{{ $listItemBerita->status }}</span>

                                    @elseif($listItemBerita->status == 'Draft')
                                        <span class="badge bg-danger">{{ $listItemBerita->status }}</span>

                                    @endif

                                </td>
                                <td>{{ $listItemBerita->categories->name }}</td>
                                <td>{{ $listItemBerita->created_at->translatedFormat('l jS F Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a
                                            href="/list-berita/{{ $listItemBerita->berita_id }}/{{ $listItemBerita->categories->name }}"><button
                                                type="button" class="btn btn-success m-1">Edit</button></a>

                                        <form action="/list-berita/delete/{{ $listItemBerita->berita_id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger m-1"
                                                onclick="return confirm('Yakin ingin hapus Berita ini?')">Hapus</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>

            <small class="d-block text-end mt-2 justify-content-start d-flex">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="{{ $listBerita->previousPageUrl() }}"
                                id="custom-paging-previous">Sebelumnya</a>
                        </li>


                        <li class="page-item"><a class="page-link" href="{{ $listBerita->nextPageUrl() }}"
                                id="custom-paging-next">Selanjutnya</a>
                        </li>
                    </ul>
                </nav>
            </small>
        </div>

    </div>
@endsection
