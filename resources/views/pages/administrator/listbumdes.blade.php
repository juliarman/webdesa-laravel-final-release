@extends('pages.administrator.layout')

@section('main-content')

    <div class="container">


        <div class="card card-body">

            <h1 style="color: #28a745">LIST BUMDES</h1>
            <p class="lead">Halaman list Badan Usaha Milik Desa</p>



            <div class="row justify-content-start">



                <div class="col-lg-auto">
                    <a href="/add-bumdes"><button class="btn btn-success mr-2 mb-3">TAMBAH
                            BERITA/INFORMASI BUMDES<i class="fa fa-paperclip m-2"></i></button></a>
                </div>












            </div>

            @if (session('message'))
                <div class="alert alert-primary">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('pesan'))
                <div data-dismiss="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>DELETE BUMDES!</strong> {{ session('pesan') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            <div class="table-responsive">
                <table class="table table-hover bg-white">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>

                            <th scope="col">Tanggal Publikasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($listBumdes as $itemBumdes => $listItemBumdes)

                            <tr>
                                <th scope="row">{{ $itemBumdes + 1 }}</th>
                                <td>{{ $listItemBumdes->judul }}

                                    @if ($listItemBumdes->status == 'Terbit')

                                        <span class="badge bg-success">{{ $listItemBumdes->status }}</span>

                                    @elseif($listItemBumdes->status == 'Draft')
                                        <span class="badge bg-danger">{{ $listItemBumdes->status }}</span>

                                    @endif

                                </td>

                                <td>{{ $listItemBumdes->created_at->translatedFormat('l jS F Y') }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/edit-bumdes/{{ $listItemBumdes->bumdes_id }}"><button type="button"
                                                class="btn btn-success m-1">Edit</button></a>

                                        <form action="/bumdes-admin/{{ $listItemBumdes->bumdes_id }}" method="post"
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
                        <li class="page-item"><a class="page-link" href="{{ $listBumdes->previousPageUrl() }}"
                                id="custom-paging-previous">Sebelumnya</a>
                        </li>


                        <li class="page-item"><a class="page-link" href="{{ $listBumdes->nextPageUrl() }}"
                                id="custom-paging-next">Selanjutnya</a>
                        </li>
                    </ul>
                </nav>
            </small>
        </div>

    </div>
@endsection
