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

                <h1 style="color: #28a745">VISI MISI DESA</h1>
                <p class="lead">Detail Visi Misi Website Desa</p>

                @if (session('message'))
                    <div class="alert alert-primary">
                        {{ session('message') }}
                    </div>
                @endif


                <form action="/visimisi-admin/" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $visiMisi->judul }}" class="form-control" name="judul"
                                    id="floatingInput" placeholder="Judul">
                                <label for="floatingInput">Judul</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mt-2">
                                <label for="namadesa">Visi-Misi Desa</label>
                                <textarea id="my-editor" name="content"
                                    class="form-control">{{ $visiMisi->content }}</textarea>


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
