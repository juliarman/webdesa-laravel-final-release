@extends('pages.administrator.layout')


@section('title', 'Halaman Bumdes')


@section('main-content')
    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">BERITA & INFORMASI BADAN USAHA MILIK DESA</h3>

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
                        <form method="POST" action="/add-bumdes">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="judulBerita">Judul</label>
                                <input type="text" class="form-control" placeholder="Masukkan judul " name="judul">
                            </div>

                            <div class="form-group">
                                <label for="subJudulBerita">Sub Judul</label>
                                <input type="text" class="form-control" placeholder="Sub judul" name="subjudul">
                            </div>

                  



                            <div class="form-group">
                                <label for="statusBerita">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" value="Terbit" type="radio" name="status"
                                        id="statusBerita">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Terbit
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Draft" type="radio" name="status"
                                        id="statusBerita">
                                    <label class="form-check-label" for="statusBerita">
                                        Draft
                                    </label>

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
                                                    class="btn btn-danger text-white">
                                                    <i class="fa fa-picture-o"></i> Pilih Gambar
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="gambar">
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
                                </div>



                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea id="my-editor" name="content" class="form-control"></textarea>


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

                                <button type="submit" class="btn btn-success">SUBMIT</button>

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
