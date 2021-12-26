@extends('layouts.app')

@section('title', 'Album Desa | Halaman Album Desa')

@section('album')

    <div class="container main-container mr-4 ml-4">
        <div class="row bg-blue p-3 justify-content-center">
            <h3 class="text-light">ALBUM DESA</h3>
        </div>
    </div>
    <div class="container main-container">

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center d-flex text-center">




                    @foreach ($photo as $item)
                        <div class="col-lg-6 mb-3 ">
                            <div class="card-body rounded shadow">
                                <div class="inner">
                                    <img src="{{ $item->image }}" alt="" class="card-img-top resize" height="210">
                                </div>
                                <div class="card-body">
                                    <div class="detail-berita mb-1">

                                        <span class="date"><i
                                                class="fas fa-calendar-alt mr-2"></i><b>{{ $item->created_at->translatedFormat('l jS F Y') }}</b></span>
                                    </div>
                                    <p class="card-text text-center ">{{ $item->album->deskripsi }}</p>
                                    <a href="{{ $item->image }}" data-lightbox="image-1"
                                        data-title="{{ $item->album->deskripsi }}">
                                        <button type="button" class="btn btn-danger">
                                            LIHAT PHOTO
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row justify-content-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="{{ $photo->previousPageUrl() }}"
                                id="custom-paging-previous">Sebelumnya</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="{{ $photo->nextPageUrl() }}"
                                id="custom-paging-next">Selanjutnya</a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>

    </div>



@endsection
