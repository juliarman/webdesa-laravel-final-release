@extends('layouts.app')


@section('title', 'Berita Desa | Halaman Berita Desa')


@section('berita')
    <div class="col-lg-8 mb-3">
        <div class="row bg-blue mb-4 mr-0 ml-0 p-2 rounded shadow text-light">
            <h3>Kategori Berita</h3>
        </div>

        <div class="row">


            @foreach ($headlinePost as $itemPost)
                <div class="col-md-12">
                    <div class="card bg-white rounded shadow-sm mb-3 woah fadeIn">
                        <img src="{{ $itemPost->getImages() }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="detail-berita mb-1">
                                <a href="" class="author mr-2"><i
                                        class="fas fa-user mr-2"></i>{{ $itemPost->users->name }}</a>
                                <span class="date"><i
                                        class="fas fa-calendar-alt mr-2"></i>{{ $itemPost->created_at->translatedFormat('l jS F Y') }}</span>
                            </div>
                            <a href="/berita/{{ $itemPost->berita_id }}/{{ $itemPost->slug }}">
                                <h4 class="card-title"><b>{{ $itemPost->judul }}</b></h4>
                            </a>
                            <p class="card-text">{!! Str::limit($itemPost->isi_konten, 180) !!}</p>

                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <div class="row">



            @foreach ($berita as $itemBerita)

                <div class="col-md-6">
                    <div class="card bg-white rounded shadow-sm mb-3 woah fadeIn">

                        <div class="inner">
                            <img class="card-img-top resize" src="{{ $itemBerita->getImages() }}" alt="Card image cap">
                        </div>

                        <div class="card-body">
                            <div class="detail-berita mb-1">
                                <a href="#" class="author mr-2 text-success"><i
                                        class="fas fa-user mr-2 text-dark "></i>{{ $itemBerita->users->name }}</a>
                                <span class="date"><i
                                        class="fas fa-calendar-alt mr-2 "></i>{{ $itemBerita->created_at->translatedFormat('l jS F Y') }}</span>
                            </div>
                            <p class="card-text">{{ $itemBerita->judul }}</p>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="{{ url('/berita/' . $itemBerita->berita_id . '/' . $itemBerita->slug) }}"
                                class="text-link-berita">
                                <h6><b>Baca Selengkapnya</b></h6>
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach














        </div>


        <small class="d-block text-end mt-2 justify-content-center d-flex">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href=" {{ $berita->previousPageUrl() }}"
                            id="custom-paging-previous">Sebelumnya</a>
                    </li>


                    <li class="page-item"><a class="page-link" href="{{ $berita->nextPageUrl() }}"
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
