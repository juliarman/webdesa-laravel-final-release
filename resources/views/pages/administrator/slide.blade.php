@extends('pages.administrator.layout')


@section('main-content')


    <div class="container">
        <div class="card card-body">

            @if (session('message'))
                <div data-dismiss="alert" class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>DITAMBAHKAN!</strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('status'))
                <div data-dismiss="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>DELETE!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif







            <form action="/slide-admin" method="post">
                {{ csrf_field() }}
                <!-- MODAL ADD SLIDE -->
                <div class="modal fade" id="modalAddSlide" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">FORM SLIDE GAMBAR</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="input-group mb-3">
                                    <div class="form-group">
                                        <script>
                                            var route_prefix = "/filemanager";
                                        </script>
                                        <h2 class="mt-4">Gambar</h2>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary text-white">
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


                                <p class="bg-light p-2">
                                    <small class="text-danger">Note: </small>

                                    Disarankan menggunakan gambar dengan resolusi 1600px * 600px
                                </p>
                                <a href="assets/images/samplebanner.jpg" download="assets/images/samplebanner.jpg">Download
                                    Sample Gambar</a>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TUTUP</button>
                                <button type="submit" class="btn btn-success"
                                    onclick="return confirm('Anda yakin ingin menyimpan data ini?')">SIMPAN DATA</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>





            <div class="row justify-content-start">
                <div class="col-lg-3">
                    <button class="btn btn-success mr-2 mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalAddSlide">TAMBAHKAN
                        SLIDE<i class="fa fa-calendar-alt m-2"></i></button>
                </div>

            </div>




            <div class="table-responsive">
                <table class="table table-hover bg-white">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Url Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>



                        @foreach ($slide as $itemSlide)
                            <tr class="text-center">

                                <td>{{ $itemSlide->url }}</td>
                                <td>
                                    <div class="btn-group">

                                        <form action="/slide-admin/{{ $itemSlide->slide_id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                class="btn btn-danger m-1">Hapus</button>
                                        </form>


                                    </div>
                                </td>
                            </tr>
                        @endforeach




                    </tbody>


                </table>

            </div>







        </div>

    </div>


@endsection
