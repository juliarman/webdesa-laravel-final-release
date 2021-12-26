@extends('layouts.app')

@section('title', 'Bumdes Desa | Halaman Bumdes Desa')


@section('bumdes')

    <div class="col-lg-8 mb-3">
        <div class="row bg-blue mb-4 mr-0 ml-0 p-2 rounded shadow text-light">
            <h3>Badan Usaha Milik Desa</h3>


        </div>


        <div class="row">

            @foreach ($bumdes as $itemBumdes)
                <div class="col-md-12">
                    <div class="card bg-white rounded shadow-sm mb-3 woah fadeIn">
                        <img src="{{ $itemBumdes->getImages() }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="detail-berita mb-1">
                                <a href="" class="author mr-2"><i
                                        class="fas fa-user mr-2"></i>{{ $itemBumdes->users->name }}</a>
                                <span class="date"><i
                                        class="fas fa-calendar-alt mr-2"></i>{{ $itemBumdes->created_at->translatedFormat('l jS F Y') }}</span>
                            </div>
                            <a href="/bumdes/{{ $itemBumdes->bumdes_id }}/{{ $itemBumdes->slug }}">
                                <h4 class="card-title"><b>{{ $itemBumdes->judul }}</b></h4>
                            </a>
                            <p class="card-text">{{ $itemBumdes->sub_judul }}</p>

                        </div>
                    </div>
                </div>

            @endforeach







        </div>


        <small class="d-block text-end mt-2 justify-content-center d-flex">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href=" {{ $bumdes->previousPageUrl() }}"
                            id="custom-paging-previous">Sebelumnya</a>
                    </li>


                    <li class="page-item"><a class="page-link" href="{{ $bumdes->nextPageUrl() }}"
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
