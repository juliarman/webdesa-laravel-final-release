@extends('pages.administrator.layout')


@section('title', 'Halaman Berita')


@section('main-content')
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">TULIS BERITA</h3>

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

                <div class="row">



                    <div class="col-lg-12">
                        <form method="POST"
                            action="/list-berita/{{ $berita->berita_id }}/{{ $berita->categories->name }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul Berita</label>
                                <input type="text" value="{{ $berita->judul }}" class="form-control"
                                    placeholder="Masukkan judul berita" name="judul">
                            </div>

                            <div class="form-group">
                                <label for="subJudulBerita">Sub Judul Berita</label>
                                <input type="text" value="{{ $berita->sub_judul }}" class="form-control"
                                    placeholder="Sub judul berita" name="subjudul">
                            </div>

                            <div class="form-group">

                                <label for="country">kategori Berita</label>
                                <select class="custom-select d-block w-100" id="country" name="categories_id" disabled
                                    required>


                                    <option value="{{ $berita->categories->categories_id }}">
                                        {{ $berita->categories->name }}</option>

                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="statusBerita">Status Berita</label>
                                <div class="form-check">
                                    <input class="form-check-input" value="Terbit"
                                        {{ $berita->status == 'Terbit' ? 'checked' : '' }} type="radio" name="status"
                                        id="statusBerita">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Terbit
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Draft"
                                        {{ $berita->status == 'Draft' ? 'checked' : '' }} type="radio" name="status"
                                        id="statusBerita">
                                    <label class="form-check-label" for="statusBerita">
                                        Draft
                                    </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <script>
                                    var route_prefix = "/filemanager";

                                </script>
                                <div class="col-md-6">
                                    <h2 class="mt-4">Thumbnail</h2>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-success text-white">
                                                <i class="fa fa-picture-o"></i> Pilih Gambar
                                            </a>
                                        </span>
                                        <input id="thumbnail" value="{{ $berita->gambar }}" class="form-control"
                                            type="text" name="gambar">
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
                                                var target_input = document.getElementById(button.getAttribute(
                                                    'data-input'));
                                                var target_preview = document.getElementById(button
                                                    .getAttribute('data-preview'));

                                                window.open(route_prefix + '?type=' + options.type || 'file',
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
                                                        img.setAttribute('style', 'height: 5rem')
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
                                                window.open(route_prefix + '?type=' + options.type || 'file',
                                                    'FileManager',
                                                    'width=900,height=600');
                                                window.SetUrl = cb;
                                            };




                                        });

                                    </script>

                                </div>
                            </div>



                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea id="my-editor" name="content"
                                            class="form-control">{!! $berita->isi_konten !!}</textarea>


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

                            <button type="submit" onclick="return confirm('Anda yakin ingin menyimpan perubahan?')"
                                class="btn btn-success">Simpan Perubahan</button>
                            <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                        </form>
                    </div>








                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Halaman Profil Desa
            </div>
            <!-- /.card-footer-->
        </div>


    </section>
@endsection
