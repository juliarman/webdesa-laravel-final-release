@extends('pages.administrator.layout')

@section('main-content')
    <div class="container">


        <div class="card card-body mt-3">
            <h1 style="color: #28a745">EDIT DATA APARATUR</h1>
            <p class="lead">Silahkan melakukan pembaharuan informasi data</p>

            

            <form action="/update-aparatur/{{ $aparatur->aparatur_id }}" method="post">

                {{ csrf_field() }}
                <input class="form-control mt-1 mb-1" value="{{ $aparatur->nama }}" name="nama" type="text"
                    placeholder="Nama" aria-label="Nama" required>

                <input class="form-control mt-1 mb-1" value="{{ $aparatur->jabatan }}" name="posisi" type="text"
                    placeholder="Posisi / Jabatan" aria-label="posisi" required>

                <input class="form-control mt-1 mb-1" value="{{ $aparatur->no_hp }}" name="nomor" type="text"
                    placeholder="No Hp / WA" aria-label="nomor" required>

                <div class="form-group">
                    <script>
                        var route_prefix = "/filemanager";

                    </script>
                    <div class="col-md-6">
                        <h2 class="mt-4">Photo</h2>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-success text-white">
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

                <button type="submit" class="btn btn-primary"
                    onclick="return confirm('Anda yakin ingin menyimpan data ini?')">UBAH DATA</button>
            </form>



        </div>

    </div>

@endsection
