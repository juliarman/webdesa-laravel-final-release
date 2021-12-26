@extends('pages.administrator.layout')


@section('main-content')


    <div class="container">
        <div class="card card-body">
            <h1 style="color: #28a745">USER ADMIN DESA</h1>
            <p class="lead">List User Admin Desa</p>
            @if (session('message'))
                <div class="alert alert-primary" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            @if (session('status'))
                <div data-dismiss="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>DELETE USER!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif




            <form action="/user-admin" method="post">
                {{ csrf_field() }}

                <!-- MODAL ADD JENIS SURAT -->
                <div class="modal fade" id="modalAddJenisSurat" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">FORM USER ADMIN</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Nama</span>
                                    <input type="text" required class="form-control" name="name"
                                        aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Username</span>
                                    <input type="text" required class="form-control" name="username"
                                        aria-describedby="basic-addon1">
                                </div>


                                <div class="input-group mb-3">
                                    <span class="input-group-text">Email</span>
                                    <input type="text" required class="form-control" name="email"
                                        aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="password" required name="password" id="password" placeholder="Password"
                                        class="form-control" data-toggle="password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">No HP</span>
                                    <input type="text" required class="form-control" name="no_hp"
                                        aria-describedby="basic-addon1">
                                </div>



                                <div class="form-group">
                                    <script>
                                        var route_prefix = "/filemanager";
                                    </script>
                                    <h2 class="mt-4">Photo</h2>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-primary text-white">
                                                <i class="fa fa-picture-o"></i> Pilih Gambar
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="foto">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TUTUP</button>
                                <button type="submit" class="btn btn-success"
                                    onclick="return confirm('Anda yakin ingin menyimpan data ini?')">SIMPAN DATA</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>




            @foreach ($user as $itemEditUser)
                <form action="/user-admin/{{ $itemEditUser->users_id }}" method="post">
                    {{ csrf_field() }}

                    <!-- MODAL ADD JENIS SURAT -->
                    <div class="modal fade" id="modalEditUser{{ $itemEditUser->users_id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">FORM EDIT USER ADMIN</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Nama</span>
                                        <input type="text" required value="{{ $itemEditUser->name }}" class="form-control"
                                            name="name" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Username</span>
                                        <input type="text" required value="{{ $itemEditUser->username }}"
                                            class="form-control" name="username" aria-describedby="basic-addon1">
                                    </div>


                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Email</span>
                                        <input type="text" required value="{{ $itemEditUser->email }}"
                                            class="form-control" name="email" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="password" required name="password" id="password"
                                            placeholder="Masukkan Ulang / Ganti Password" class="form-control"
                                            data-toggle="password">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">No HP</span>
                                        <input type="text" required class="form-control"
                                            value="{{ $itemEditUser->no_hp }}" name="no_hp"
                                            aria-describedby="basic-addon1">
                                    </div>



                                    <div class="form-group">
                                        <script>
                                            var route_prefix = "/filemanager";
                                        </script>
                                        <h2 class="mt-4">Photo</h2>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary text-white">
                                                    <i class="fa fa-picture-o"></i> Pilih Gambar
                                                </a>
                                            </span>
                                            <input id="thumbnail" value="{{ $itemEditUser->foto }}" class="form-control"
                                                type="text" name="foto">
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">TUTUP</button>
                                    <button type="submit" class="btn btn-success"
                                        onclick="return confirm('Anda yakin ingin menyimpan data ini?')">SIMPAN
                                        DATA</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach





            <div class="row justify-content-start">
                <div class="col-lg-3">
                    <button class="btn btn-success mr-2 mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalAddJenisSurat">TAMBAH USER ADMIN<i class="fas fa-users-cog m-2"></i></button>
                </div>

            </div>


            <table class="table table-hover">
                <thead>
                    <tr>

                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $itemUser)
                        <tr>
                            <td>{{ $itemUser->name }}</td>
                            <td>{{ $itemUser->email }}</td>
                            <td>{{ $itemUser->no_hp }}</td>
                            <td>
                                <div class="btn-group">

                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalEditUser{{ $itemUser->users_id }}"
                                        class="btn btn-success m-1">Edit</button>

                                    <form action="/user-admin/{{ $itemUser->users_id }}" method="post" class="d-inline">
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


@endsection
