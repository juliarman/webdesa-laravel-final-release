@extends('layouts.app')

@section('title', $id->judul)

@section('meta-seo')


    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $id->judul }}">
    <meta property="og:image" content="{{ $id->gambar }}">
    <meta property="og:description" content="{{ $id->sub_judul }}">




@endsection

@section('detail-post')


    <div class="col-lg-8">

        <div class="card shadow rounded mb-3">
            <div class="card-body">
                <h1 class="mt-4">{{ $id->judul }}</h1>
                <hr>
                <div class="publication-details mt-2 mb-2">
                    <a href="#" class=" author mr-2"><i class="fas fa-user mr-2"></i>{{ $id->users->name }}</a>
                    <span class="date"><i
                            class="fas fa-calendar-alt mr-2"></i>{{ $id->created_at->translatedFormat('l jS F Y') }}</span>
                </div>

                <hr>

                <div class="wrapper">
                    <img class="img-fluid rounded card-img-top" src="{{ $id->getImages() }}" alt="">
                </div>

                <hr>
                <article class="ml-4 mr-4">
                    {!! $id->isi_konten !!}
                </article>
            </div>

            <div class="card-footer p-4">
                Di Publikasikan oleh <span class="text-success">{{ $id->users->name }}</span>
            </div>

        </div>

    </div>


    @include('includes.sidebar', [
    'dataSidebar'=> $data,
    'dataNomor'=> $nopenting,
    'dataProfile' => $profile,

    ])



@endsection
