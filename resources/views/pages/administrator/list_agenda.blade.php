@extends('pages.administrator.layout')


@section('main-content')


    <div class="container">
        <div class="card card-body">
            <h1 style="color: #28a745">AGENDA DESA</h1>
            <p class="lead">Selamat datang di halaman Agenda Desa</p>
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
                    <strong>DELETE AGENDA!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <a href="{{ url('/agenda-admin/add') }}"><button class="btn btn-success mr-2 mb-3">BUAT AGENDA<i
                        class="fa fa-calendar-alt m-2"></i></button></a>

            <div class="table-responsive">
                <table class="table table-hover bg-white">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Tempat</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($listAgenda as $itemAgenda => $agenda)
                            <tr class="text-center">
                                <th scope="row">

                                    {{ $listAgenda->firstItem() + $itemAgenda }}

                                </th>
                                <td>{{ $agenda->judul }}</td>
                                <td>{{ $agenda->tempat }}</td>
                                <td>{{ $agenda->waktu }}</td>
                                <td>{{ $agenda->tanggal }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('agenda-admin/edit/' . $agenda->agenda_id) }}"> <button
                                                type="button" class="btn btn-success m-1">Edit</button></a>

                                        <form action="/agenda-admin/{{ $agenda->agenda_id }}" method="post"
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

                    </tbody>


                </table>
                <small class="d-block text-end mt-2 justify-content-start d-flex">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $listAgenda->previousPageUrl() }}"
                                    id="custom-paging-previous">Sebelumnya</a>
                            </li>


                            <li class="page-item"><a class="page-link" href="{{ $listAgenda->nextPageUrl() }}"
                                    id="custom-paging-next">Selanjutnya</a>
                            </li>
                        </ul>
                    </nav>
                </small>
            </div>







        </div>

    </div>


@endsection
