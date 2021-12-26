@extends('layouts.app')



@section('list-artikel')

    <div class="col-lg-8 mb-3">
        <div class="row bg-dark mb-4 mr-0 ml-0 p-2 rounded shadow text-light">
            <h3>Halaman Berita Desa</h3>


        </div>


        <div class="row">


            @foreach ($article as $itemArticle)
                <div class="col-md-12">
                    <div class="card bg-white rounded shadow-sm mb-3 woah fadeIn">
                        <img src="{{ $itemArticle->getImages() }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="detail-berita mb-1">
                                <a href="" class="author mr-2"><i class="fas fa-user mr-2"></i>Juliarman Umar</a>
                                <span class="date"><i
                                        class="fas fa-calendar-alt mr-2"></i>{{ $itemArticle->created_at->translatedFormat('l jS F Y') }}</span>
                            </div>
                            <a href="/berita/{{ $itemArticle->berita_id }}/{{ $itemArticle->slug }}">
                                <h4 class="card-title"><b>{{ $itemArticle->judul }}</b></h4>
                            </a>
                            <p class="card-text">{{ $itemArticle->sub_judul }}</p>

                        </div>
                    </div>
                </div>
            @endforeach









        </div>


        <small class="d-block text-end mt-2 justify-content-center d-flex">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="" id="custom-paging-previous">Sebelumnya</a>
                    </li>


                    <li class="page-item"><a class="page-link" href="" id="custom-paging-next">Selanjutnya</a>
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
