@extends('layouts/app')

@section('title', 'Berita Terbaru')



@section('detail-post')


    <div class="col-lg-8">

        <div class="card shadow rounded mb-3">
            <div class="card-body">
                <h1 class="mt-4">{{ $news->judul }}</h1>
                <hr>
                <div class="publication-details mt-2 mb-2">
                    <a href="#" class=" author mr-2"><i class="fas fa-user mr-2"></i>Juliarman Umar</a>
                    <span class="date"><i class="fas fa-calendar-alt mr-2"></i>Maret 30, 2021</span>
                </div>

                <hr>

                <div class="wrapper">
                    <img class="img-fluid rounded card-img-top" src="{{ $news->getImages() }}" alt="">
                </div>

                <hr>
                <article class="ml-4 mr-4">
                    {!! $news->isi_konten !!}
                </article>
            </div>

            <div class="card-footer p-4">
                Di Publikasikan oleh <span class="text-success">{{ $news->users->name }}</span>
            </div>

        </div>

    </div>


    @include('includes.sidebar', [
    'dataSidebar'=> $data,
    'dataNomor'=> $nopenting,
    'dataProfile' => $profile,

    ])


@endsection
