@extends('pages.administrator.layout')

@section('main-content')
    <div class="container">


        <div class="card card-body mt-3">
            <h1 style="color: #28a745">APARATUR DESA</h1>
            <p class="lead">Selamat datang di halaman Aparatur Desa</p>

            <a href="#"><button class="btn btn-success mr-2 mb-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">TAMBAH
                    APARATUR<i class="fa fa-plus-square m-2"></i></button></a>


            @if (Session::has('pesan'))
                <div class="alert alert-primary"><span class="glyphicon glyphicon-ok"></span><em>
                        {!! session('pesan') !!}</em></div>
            @endif

            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>

            @endif

            <!-- ADD APARATUR DESA -->
            <form action="/aparatur-desa" method="post">
                {{ csrf_field() }}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">DETAIL APARATUR DESA</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">



                                <input class="form-control mt-1 mb-1" name="nama" type="text" placeholder="Nama"
                                    aria-label="Nama" required>

                                <input class="form-control mt-1 mb-1" name="posisi" type="text"
                                    placeholder="Posisi / Jabatan" aria-label="posisi" required>

                                <input class="form-control mt-1 mb-1" name="nomor" type="text" placeholder="No Hp / WA"
                                    aria-label="nomor" required>


                                <div class="form-group">
                                    <script>
                                        var route_prefix = "/filemanager";

                                    </script>
                                    <div class="col-md-6">
                                        <h2 class="mt-4">Photo</h2>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-success text-white">
                                                    <i class="fa fa-picture-o"></i> Pilih Gambar
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="gambar" required>
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




            <div class="table-responsive">
                <table class="table table-hover bg-white">

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">No Handphone</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($aparatur as $itemAparatur => $aparatur)
                            <tr>
                                <th scope="row">{{ $itemAparatur + 1 }}</th>
                                <td>{{ $aparatur->nama }}</td>
                                <td>{{ $aparatur->jabatan }}</td>
                                <td>{{ $aparatur->no_hp }}</td>
                                <td>


                                    <a href="{{ url('edit-aparatur', $aparatur->aparatur_id) }}"><button type="button"
                                            class="btn btn-success">Edit</button></a>

                                    <form action="/aparatur-desa/{{ $aparatur->aparatur_id }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                            class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>



        </div>

    </div>

@endsection
