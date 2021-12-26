@extends('layouts/app')

@section('title', $berita->judul)


@section('meta-seo')


    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $berita->judul }}">
    <meta property="og:image" content="{{ $berita->gambar }}">
    <meta property="og:description" content="{{ $berita->sub_judul }}">




@endsection

@section('detail-post')


    <div class="col-lg-8">

        <div class="card shadow rounded mb-3">
            <div class="card-body">
                <h1 class="mt-4">{{ $berita->judul }}</h1>
                <hr>
                <div class="publication-details mt-2 mb-2">
                    <a href="#" class=" author mr-2"><i class="fas fa-user mr-2"></i>{{ $berita->users->name }}</a>
                    <span class="date"><i
                            class="fas fa-calendar-alt mr-2"></i>{{ $berita->created_at->translatedFormat('l jS F Y') }}</span>
                </div>

                <hr>

                <div class="wrapper">
                    <img class="img-fluid rounded card-img-top" src="{{ $berita->getImages() }}" alt="">
                </div>

                <hr>
                <article class="ml-4 mr-4 post-image">
                    {!! $berita->isi_konten !!}
                </article>
            </div>

            <div class="card-footer p-4">
                Di Publikasikan oleh <span class="text-success">{{ $berita->users->name }}</span>
            </div>

        </div>

    </div>


    @include('includes.sidebar', [
    'dataSidebar'=> $data,
    'dataNomor'=> $nopenting,
    'dataProfile' => $profile,

    ])



@endsection
