@extends('pages.administrator.layout')


@section('main-content')


    <div class="container">
        <div class="card card-body">
            <h1 style="color: #28a745">HALAMAN PENGADUAN</h1>
            <p class="lead">Selamat datang di halaman Pengaduan Desa</p>
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
                    <strong>DELETE!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="table-responsive">
                <table class="table table-hover bg-white">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Subjek</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Status</th>

                        </tr>
                    </thead>
                    <tbody>


                        @if (count($pengaduan))


                            @foreach ($pengaduan as $item => $listPengaduan)
                                <tr class="text-center">
                                    <th scope="row">
                                        {{ $item + 1 }}

                                    </th>
                                    <td>{{ $listPengaduan->nama }}</td>
                                    <td>{{ $listPengaduan->subjek }}</td>
                                    <td>{{ $listPengaduan->created_at->translatedFormat('l jS F Y ') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <div class="col-lg-auto">

                                                <a href="/pengaduan-admin/{{ $listPengaduan->pengaduan_id }}">
                                                    <button class="btn btn-success m-1">Lihat</button>
                                                </a>

                                            </div>



                                            <form action="/pengaduan-admin/{{ $listPengaduan->pengaduan_id }}"
                                                method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-danger m-1">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($listPengaduan->status == 'Disetujui')

                                            <h6 class="text-success">{{ $listPengaduan->status }}</h6>

                                        @elseif ($listPengaduan->status == "Belum Disetujui")

                                            <h6 class="text-danger">{{ $listPengaduan->status }}</h6>

                                        @endif
                                        {{-- <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Aktifkan</label>
                                    </div> --}}
                                    </td>
                                </tr>


                            @endforeach


                        @endif


                    </tbody>


                </table>
                <small class="d-block text-end mt-2 justify-content-start d-flex">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $pengaduan->previousPageUrl() }}"
                                    id="custom-paging-previous">Sebelumnya</a>
                            </li>


                            <li class="page-item"><a class="page-link" href="{{ $pengaduan->nextPageUrl() }}"
                                    id="custom-paging-next">Selanjutnya</a>
                            </li>
                        </ul>
                    </nav>
                </small>
            </div>











        </div>

    </div>


@endsection
