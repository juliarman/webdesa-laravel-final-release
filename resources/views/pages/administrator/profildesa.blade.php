@extends('pages.administrator.layout')


@section('main-content')
    <section class="content">

        <div class="card">
            <div class="card-header">

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <h1 style="color: #28a745">PROFIL DESA</h1>
                <p class="lead">Detail Informasi Halaman Website Desa</p>

                @if (session('message'))
                    <div class="alert alert-primary">
                        {{ session('message') }}
                    </div>
                @endif

                @foreach ($profileDesa as $itemDesa)
                    <form action="/profil-desa/{{ $itemDesa->profile_id }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 mt-2 mb-2">
                                <label for="namadesa">Nama Desa</label>
                                <input type="text" value="{{ $itemDesa->nama_desa }}" class="form-control" id="namadesa"
                                    name="namadesa">
                            </div>


                            <div class="col-lg-6 mt-2 mb-2">
                                <label for="email">Email</label>
                                <input type="text" value="{{ $itemDesa->email }}" class="form-control" id="email"
                                    name="email" placeholder="Email Desa...">
                            </div>

                            <div class="col-lg-6 mt-2 mb-2">
                                <label for="namadesa">No Telpon</label>
                                <input type="text" value="{{ $itemDesa->no_telpon }}" class="form-control" id="namadesa"
                                    name="notelpon" placeholder="Masukkan nama desa...">
                            </div>


                            <div class="col-lg-6 mt-2 mb-2">
                                <label for="namadesa">Url Website</label>
                                <input type="text" value="{{ $itemDesa->url }}" class="form-control" name="urlwebsite"
                                    id="namadesa" placeholder="Masukkan nama desa...">
                            </div>


                            <div class="col-lg-6 mt-2 mb-2">
                                <label for="namadesa">Deskripsi</label>
                                <div class="form-floating">
                                    <textarea class="form-control" name="deskripsi"
                                        style="height: 100px">{{ $itemDesa->deskripsi }}</textarea>

                                </div>
                                {{-- <input type="text" value="{{ $itemDesa->deskripsi }}" class="form-control" id="namadesa"
                                    name="deskripsi"> --}}
                            </div>


                            <div class="col-lg-3 mt-2 mb-2">
                                <label for="namadesa">Kepala Desa</label>
                                <input type="text" class="form-control" name="kepaladesa" id="namadesa"
                                    value="{{ $itemDesa->kepala_desa }}">
                            </div>
                            <div class="col-lg-3 mt-2 mb-2">
                                <label for="namadesa">Photo</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="photo" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-secondary text-white">
                                            <i class="fa fa-picture-o"></i> Pilih Photo
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="photo"
                                        value="{{ $itemDesa->photo_kepdes }}">
                                </div>

                            </div>

                            <div class="col-lg-6 mt-2 mb-2">
                                <label for="namadesa">Alamat</label>
                                <input type="text" value="{{ $itemDesa->alamat }}" class="form-control" id="namadesa"
                                    name="alamat">
                            </div>

                            <div class="col-lg-6 mt-2 mb-2">

                                <script>
                                    var route_prefix = "/filemanager";

                                </script>
                                <label class="form-label" for="customFile">Logo Website</label>


                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="logo" data-preview="holder"
                                            class="btn btn-secondary text-white">
                                            <i class="fa fa-picture-o"></i> Pilih Gambar
                                        </a>
                                    </span>
                                    <input id="logo" value="{{ $itemDesa->logo }}" class="form-control" type="text"
                                        name="logo">
                                </div>

                                <script>
                                    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}

                                </script>
                                <script>
                                    $('#photo').filemanager('image', {
                                        prefix: route_prefix
                                    });
                                    // $('#lfm').filemanager('file', {prefix: route_prefix});

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
                                                    let img = document.createElement('img')
                                                    img.setAttribute('style',
                                                        'height: 5rem')
                                                    img.setAttribute('src', item.thumb_url)
                                                    target_preview.appendChild(img);
                                                });

                                                // trigger change event
                                                target_preview.dispatchEvent(new Event('change'));
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

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mt-4">
                                        <label for="namadesa">Konten Profil Desa</label>
                                        <textarea id="my-editor" name="content"
                                            class="form-control">{!! $itemDesa->isi_konten !!}</textarea>


                                        <script>
                                            var options = {

                                                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
                                                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
                                            };

                                        </script>
                                        <script>
                                            CKEDITOR.replace('my-editor', {
                                                filebrowserUploadUrl: "{{ route('post.image', ['_token' => csrf_token()]) }}",
                                                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
                                                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                                filebrowserUploadMethod: 'form'
                                            });

                                        </script>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-auto justify-content-center text-center">
                                <Button type="submit" class="btn btn-success m-2">
                                    SIMPAN PERUBAHAN
                                </Button>
                            </div>


                        </div>
                @endforeach
                </form>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Halaman Profil Desa
            </div>
            <!-- /.card-footer-->
        </div>


    </section>
@endsection
