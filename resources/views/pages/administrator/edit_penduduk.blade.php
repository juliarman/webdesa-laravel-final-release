@extends('pages.administrator.layout')


@section('main-content')



    <div class="container">


        <div class="card card-body">
            <h1 style="color: #28a745">EDIT DATA PENDUDUK</h1>
            <p class="lead">Selamat datang di halaman input penduduk</p>

            <form action="/edit-penduduk/{{ $edPenduduk->penduduk_id }}" method="post">

                {{ csrf_field() }}

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="NamaLengkap" placeholder=""
                            value="{{ $edPenduduk->nama }}" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder=""
                            value="{{ $edPenduduk->pekerjaan }}" required>
                        <div class="invalid-feedback">
                            Valid pekerjaan is required.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="nkk">Nomor Induk Kependudukan (NIK)</label>
                        <input type="number" class="form-control" name="nik" id="nik" placeholder=""
                            value="{{ $edPenduduk->no_nik }}" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="nkk">Nomor Kartu Keluarga (NKK)</label>
                        <input type="number" class="form-control" name="nkk" id="nkk" placeholder=""
                            value="{{ $edPenduduk->no_kk }}" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder=""
                            value="{{ $edPenduduk->alamat }}" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="nohp">No HP</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" placeholder=""
                            value="{{ $edPenduduk->no_hp }}" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">

                        <label for="kodepos">Tanggal Lahir</label>
                        <div class="input-group">

                            <input type="text" id="tanggal" name="tanggal" class="form-control"
                                placeholder="Tanggal Lahir ...." value="{{ $edPenduduk->tgl_lahir }}" required>
                        </div>
                        <span class="glyphicon glyphicon-calendar"></span>

                        <script type="text/javascript">
                            $('#tanggal').datepicker({
                                format: 'dd-mm-yyyy',

                            });

                        </script>
                        {{-- <label for="kodepos">Kode Pos</label>
                        <input type="number" class="form-control" id="kodepos" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div> --}}
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="country">Agama</label>
                        <select class="custom-select d-block w-100" name="agama" id="agama" required>
                            <option value="" selected disabled>Pilih Agama...</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Kong Hu Cu">Kong Hu Cu</option>
                            <option value="Tanpa Keterangan">Tanpa Keterangan</option>


                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>




                </div>


                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="country">Provinsi</label>
                        <select class="custom-select d-block w-100" name="province" id="province" required>
                            <option value="" selected disabled>Pilih Provinsi...</option>


                            @foreach ($provinsi as $item)
                                <option value="{{ $item->nama_provinsi }}">

                                    {{ $item->nama_provinsi }}
                                </option>

                            @endforeach

                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>


                    <div class="col-md-3 mb-3">
                        <label for="state"> Kabupaten/Kota</label>
                        <select class="custom-select d-block w-100" name="state" id="state" required>


                            <option value="" selected disabled>Pilih Kabupaten/Kota...</option>


                            @foreach ($kota as $itemKota)

                                <option value="{{ $itemKota->nama_kota }}">{{ $itemKota->nama_kota }}</option>

                            @endforeach

                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>


                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input radio-inline" value="Laki-laki" type="radio"
                                        name="jenkel" id="jenkel" value="Laki-laki"
                                        {{ $edPenduduk->kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                    Laki-laki</label>
                            </div>

                            <div class="form-check"><label class="form-check-label">
                                    <input class="form-check-input radio-inline" value="Perempuan" type="radio"
                                        name="jenkel" id="perempuan" value="Perempuan"
                                        {{ $edPenduduk->kelamin == 'Perempuan' ? 'checked' : '' }}>
                                    Perempuan</label>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="Tanpa Keterangan"
                                        {{ $edPenduduk->kelamin == 'Tanpa Keterangan' ? 'checked' : '' }} name="jenkel"
                                        id="tanpaket" value="Tanpa Keterangan">
                                    Tanpa Keterangan</label>

                            </div>

                        </div>
                    </div>




                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <script>
                                var route_prefix = "/filemanager";

                            </script>
                            <h2 class="mt-4">Photo</h2>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-secondary text-white">
                                        <i class="fa fa-picture-o"></i> Pilih Gambar
                                    </a>
                                </span>
                                <input id="thumbnail" value="{{ $edPenduduk->photo }}" class="form-control" type="text"
                                    name="photo">
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








                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <button class="btn btn-success btn-lg btn-block" type="submit">Simpan Data</button>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-danger btn-lg btn-block" type="submit">Bersihkan Inputan</button>
                    </div>
                </div>


            </form>

        </div>

    </div>

@endsection
