@extends('pages.administrator.layout')


@section('main-content')


    <div class="container">
        <div class="card card-body">
            <h1 style="color: #28a745">ALBUM DESA</h1>
            <p class="lead">Kumpulan photo album kegiatan Desa</p>

            @if (session('message'))

                <div class="alert alert-primary" role="alertdialog">
                    {{ session('message') }}
                </div>

            @endif

            <div class="row justify-content-start">


                <div class="col-lg-auto">
                    <button class="btn btn-danger mr-2 mb-3" data-bs-toggle="modal" data-bs-target="#modalAddPhoto">UPLOAD
                        PHOTO<i class="fa fa-calendar-alt m-2"></i></button>
                </div>

                <div class="modal fade" id="modalAddPhoto" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Photo Album</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <form action="/album-admin/save" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <script>
                                            var route_prefix = "/filemanager";

                                        </script>
                                        <div class="col-sm-auto">

                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                        class="btn btn-success text-white">
                                                        <i class="fa fa-picture-o"></i> Pilih Gambar
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" type="text" name="gambar"
                                                    required>
                                            </div>

                                            <script>
                                                {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}

                                            </script>
                                            <script>
                                                $('#lfm').filemanager('image', {
                                                    prefix: route_prefix
                                                });
                                                // $('#lfm').filemanager('file', {prefix: route_prefix});

                                            </script>
                                            <script>
                                                var lfm = function(id, type, options) {
                                                    let button = document.getElementById(id);

                                                    button.addEventListener('click', function() {
                                                        var route_prefix = (options && options.prefix) ? options
                                                            .prefix : '/filemanager';
                                                        var target_input = document.getElementById(button
                                                            .getAttribute(
                                                                'data-input'));
                                                        var target_preview = document.getElementById(button
                                                            .getAttribute('data-preview'));

                                                        window.open(route_prefix + '?type=' + options.type ||
                                                            'file',
                                                            'FileManager',
                                                            'width=900,height=600');
                                                        window.SetUrl = function(items) {
                                                            var file_path = items.map(function(item) {
                                                                return item.url;
                                                            }).join(',');

                                                            // set the value of the desired input to image url
                                                            target_input.value = file_path;
                                                            target_input.dispatchEvent(new Event('change'));

                                                            // clear previous preview
                                                            target_preview.innerHtml = '';

                                                            // set or change the preview image src
                                                            items.forEach(function(item) {
                                                                let img = document.createElement(
                                                                    'img')
                                                                img.setAttribute('style',
                                                                    'height: 5rem')
                                                                img.setAttribute('src', item
                                                                    .thumb_url)
                                                                target_preview.appendChild(img);
                                                            });

                                                            // trigger change event
                                                            target_preview.dispatchEvent(new Event(
                                                                'change'));
                                                        };
                                                    });
                                                };

                                                lfm('lfm2', 'file', {
                                                    prefix: route_prefix
                                                });

                                            </script>
                                            <script>
                                                $(document).ready(function() {

                                                    // Nabukka filemanager na
                                                    var lfm = function(options, cb) {
                                                        var route_prefix = (options && options.prefix) ? options
                                                            .prefix : '/filemanager';
                                                        window.open(route_prefix + '?type=' + options.type ||
                                                            'file',
                                                            'FileManager',
                                                            'width=900,height=600');
                                                        window.SetUrl = cb;
                                                    };




                                                });

                                            </script>
                                            <select class="form-select form-select-lg mb-3 mt-3"
                                                aria-label=".form-select-lg example" name="album">
                                                <option value="" selected disabled>Pilih Jenis Album</option>
                                                @foreach ($album as $itemAlbum)

                                                    <option value="{{ $itemAlbum->album_id }}">
                                                        {{ $itemAlbum->nama_album }}</option>
                                                @endforeach

                                            </select>

                                        </div>


                                    </div>

                                    <button type="submit" onclick=" return confirm('Klik Oke untuk embuat Album')"
                                        class="btn btn-success m-3">SIMPAN</button></a>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>







                <div class="col-lg-auto">
                    <button class="btn btn-success mr-2 mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalAddJudulAlbum">BUAT ALBUM<i class="fa fa-calendar-alt m-2"></i></button>
                </div>

                <div class="modal fade" id="modalAddJudulAlbum" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">BUAT ALBUM</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <form action="/album-admin" method="post">
                                    {{ csrf_field() }}
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">NAMA ALBUM</span>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama Album!"
                                                    aria-label="Nama" aria-describedby="basic-addon1" name="namaAlbum">
                                            </div>

                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="input-group">
                                                <span class="input-group-text">DESKRIPSI ALBUM</span>
                                                <textarea class="form-control" placeholder="Deskripsi Album..."
                                                    name="deskripsiAlbum" aria-label="With textarea"></textarea>
                                            </div>
                                        </li>
                                    </ul>
                                    <button type="submit" onclick=" return confirm('Klik Oke untuk embuat Album')"
                                        class="btn btn-success m-3">SIMPAN</button></a>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-auto">
                    <button class="btn btn-secondary mr-2 mb-3" data-bs-toggle="modal" data-bs-target="#modalListAlbum">LIST
                        JUDUL ALBUM<i class="fa fa-calendar-alt m-2"></i></button>
                </div>


                <div class="modal fade" id="modalListAlbum" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">LIST NAMA ALBUM</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <ul class="list-group">
                                    @foreach ($album as $itemAlbum)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $itemAlbum->nama_album }}
                                            <span class="badge">
                                                <form action="/album-admin/delete/{{ $itemAlbum->album_id }}"
                                                    method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                        class="btn btn-danger m-1">Hapus</button>
                                                </form>
                                            </span>
                                        </li>
                                    @endforeach

                                </ul>

                            </div>

                        </div>
                    </div>
                </div>



            </div>

            <hr>






            <div class="row">
                @foreach ($photo as $itemPhoto)
                    <div class="col-sm-3 text-center">
                        <div class="card">
                            <img src="{{ $itemPhoto->image }}" class="img-card-top" alt="Album Desa">
                            <div class="card-body">
                                <h5 class="card-title text-center fw-bold">{{ $itemPhoto->album->deskripsi }}</h5>
                                <p class="card-subtitle">{{ $itemPhoto->created_at->translatedFormat('l jS F Y') }}</p>
                            </div>

                            <div class="card-footer">
                                <form action="/album-admin/photo/{{ $itemPhoto->photo_id }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                        class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </div>


@endsection
