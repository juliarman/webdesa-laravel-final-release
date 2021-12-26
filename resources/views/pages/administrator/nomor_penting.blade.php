@extends('pages.administrator.layout')


@section('main-content')


    <div class="container">
        <div class="card card-body">
            <h1 style="color: #28a745">NOMOR PENTING</h1>
            <p class="lead">List nomor penting</p>


            <div class="row">


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

                <div class="col-lg-5">
                    <div class="table-responsive">
                        <table class="table table-hover bg-white">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Instansi</th>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($noPenting as $item => $itemNoPenting)

                                    <tr class="text-center">
                                        <th scope="row">
                                            {{ $item + 1 }}
                                        </th>
                                        <td>{{ $itemNoPenting->nama }}</td>
                                        <td>{{ $itemNoPenting->nomor }}</td>

                                        <td>
                                            <form action="/nomor-penting/{{ $itemNoPenting->nopenting_id }}" method="post"
                                                class="d-inline">
                                                {{ csrf_field() }}
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-danger">Hapus</button>
                                            </form>

                                        </td>

                                    </tr>

                                @endforeach





                            </tbody>


                        </table>

                    </div>
                    <small class="d-block text-end mt-2 justify-content-start d-flex">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="{{ $noPenting->previousPageUrl() }}"
                                        id="custom-paging-previous">Sebelumnya</a>
                                </li>


                                <li class="page-item"><a class="page-link" href="{{ $noPenting->nextPageUrl() }}"
                                        id="custom-paging-next">Selanjutnya</a>
                                </li>
                            </ul>
                        </nav>
                    </small>
                </div>




                <div class="col-lg-6">

                    <h4 class="text-center">TAMBAHKAN NOMOR PENTING</h4>

                    <form action="/nomor-penting" method="post">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark">Nama Instansi</span>
                            <input type="text" name="namainstansi" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-dark">Nomor Penting</span>
                            <input type="text" name="nomorpenting" class="form-control">
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success"
                                onclick="return confirm('Anda yakin ingin menyimpan nomor?')">SIMPAN NOMOR</button>
                        </div>
                    </form>

                </div>





            </div>


        </div>

    </div>


@endsection
