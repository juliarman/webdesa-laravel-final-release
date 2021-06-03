@extends('layouts.app')

@section('title', 'Agenda Desa | Halaman Agenda')


@section('agenda')



    <div class="jumbotron p-3 p-md-5 text-white rounded">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Selamat Datang Di Halaman Agenda</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                efficiently
                about what's most interesting in this post's contents.</p>

        </div>
    </div>



    <div class="col-lg-8 mb-3">
        <div class="row bg-dark mb-4 mr-0 ml-0 p-2 rounded shadow text-light">
            <h3>Daftar Agenda</h3>
        </div>




        <div class="row">

            @foreach ($agenda as $itemAgenda)

                <div class="col-md-12">
                    <div class="card bg-white rounded shadow-sm mb-3 woah fadeIn">
                        <div class="card-header bg-green text-light">
                            <h3>{{ $itemAgenda->judul }}</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-striped">

                                <tr class="table-primary">
                                <tr>
                                    <td class="table-dark" style="width: 120px">Tempat :</td>
                                    <td class="table-secondary">{{ $itemAgenda->tempat }}</td>
                                </tr>

                                <tr>
                                    <td class="table-dark" style="width: 120px">Waktu :</td>
                                    <td class="table-secondary">{{ $itemAgenda->waktu }}</td>
                                </tr>

                                <tr>
                                    <td class="table-dark" style="width: 120px">Tanggal :</td>
                                    <td class="table-secondary">{{ $itemAgenda->tanggal }}</td>
                                </tr>

                            </table>

                            <span style="color: #28a745">Keterangan :</span>
                            <p style="font-style: italic">{{ $itemAgenda->keterangan }}</p>


                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- <div class="detail-berita mb-1">
                                        <a href="#" class="author mr-2"><i class="fas fa-user mr-2">
                                                {{ $itemAgenda->users->name }}</i></a>
                                        <span class="date"><i
                                                class="fas fa-calendar-alt mr-2"></i>{{ $itemAgenda->created_at->format('Y-m-d') }}</span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>







                    </div>
                </div>




            @endforeach




        </div>





        <small class="d-block text-end mt-2 justify-content-center d-flex">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href=" {{ $agenda->previousPageUrl() }}"
                            id="custom-paging-previous">Sebelumnya</a>
                    </li>


                    <li class="page-item"><a class="page-link" href="{{ $agenda->nextPageUrl() }}"
                            id="custom-paging-next">Selanjutnya</a>
                    </li>
                </ul>
            </nav>
        </small>








    </div>

    @include('includes.sidebar', [
    'dataSidebar'=> $data,
    'dataNomor'=> $nopenting,
    'dataProfile' => $profile,

    ])

@endsection
