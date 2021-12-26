@extends('layouts.app')

@section('title', 'Layanan Surat Online')




@section('surat')


    <div class="container">
        <div class="row">

            <div class="card card-body">
                <div class="col-xl-8 offset-xl-2 py-5">

                    <h1 style="text-align: center">
                        <p>Pelayanan Surat Online</p>
                        @foreach ($profile as $itemProfile)
                            <a href="/" class="text-success">{{ $itemProfile->nama_desa }}</a>
                        @endforeach
                    </h1>

                    <p class="lead">Silahkan lengkapi form untuk pengurusan surat online</p>


                    <form action="/surat" id="contact-form" method="post" role="form" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Nama *</label>
                                        <input id="form_name" type="text" name="name" class="form-control"
                                            placeholder="Silahkan masukkan nama anda *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">NIK *</label>
                                        <input id="form_lastname" type="text" name="nik" class="form-control"
                                            placeholder="Silahkan masukkan NIK anda *" required
                                            data-error="NIK Harus diisi!.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">No. Telp / Whatsapp *</label>
                                        <input id="form_email" type="text" name="telp" class="form-control"
                                            placeholder="Masukkan No. Telp / Whatsapp anda *" required
                                            data-error="Format telpon salah.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-error has-danger">
                                        <label for="form_need">Pilih Jenis Surat *</label>
                                        <select id="form_need" name="jenis_surat" class="form-control" required>
                                            <option value="Pilih Jenis Surat" selected disabled>Pilih Jenis Surat</option>

                                            @foreach ($jsurat as $itemJsurat)
                                                <option value="{{ $itemJsurat->jenis_surat }}">
                                                    {{ $itemJsurat->jenis_surat }}</option>

                                            @endforeach

                                        </select>
                                        <div class="help-block with-errors">

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Umur *</label>
                                        <input id="form_email" type="text" name="umur" class="form-control"
                                            placeholder="Masukkan umur anda *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Tempat Tanggal Lahir * </label>

                                        <input id="form_email" type="text" name="ttl" class="form-control"
                                            placeholder="Contoh: Jakarta, 3 Agustus 1980" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Pekerjaan *</label>
                                        <input id="form_email" type="text" name="pekerjaan" class="form-control"
                                            placeholder="Masukkan pekerjaan anda *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_email">Alamat Lengkap * </label>

                                        <input id="form_email" type="text" name="alamat" class="form-control"
                                            placeholder="Masukkan alamat lengkap anda *" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">Agama *</label>
                                        <select class="custom-select d-block w-100" name="agama" required>


                                            <option value="" selected disabled>Pilih Agama...</option>


                                            <option value="Islam">Islam</option>
                                            <option value="Kristen Protestan">Kristen Protestan</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddha">Buddha</option>
                                            <option value="Kong Hu Cu">Kong Hu Cu</option>
                                            <option value="Tanpa Keterangan">Tanpa Keterangan</option>


                                        </select>


                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenisKelamin">Jenis Kelamin</label>
                                        <div class="form-check d-block">
                                            <label class="form-check-label">
                                                <input class="form-check-input radio-inline" value="Laki-laki" type="radio"
                                                    name="jenkel" id="jenkel" value="Laki-laki">
                                                Laki-laki</label>
                                        </div>
                                        <div class="form-check d-block"><label class="form-check-label">
                                                <input class="form-check-input radio-inline" value="Perempuan" type="radio"
                                                    name="jenkel" id="perempuan" value="Perempuan">
                                                Perempuan</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="exampleFormControlTextarea1" class="form-label">Photo Berkas
                                            Pendukung 1</label>
                                        <input type="file" name="photo1" style="height: 45px" class="form-control"
                                            aria-label="file example" required>
                                        <div class="invalid-feedback">Example invalid form file feedback</div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label">Photo Berkas
                                            Pendukung 2</label>
                                        <input type="file" name="photo2" style="height: 45px" class="form-control"
                                            aria-label="file example" required>
                                        <div class="invalid-feedback">Example invalid form file feedback</div>
                                    </div>
                                </div>


                            </div>




                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Pesan *</label>
                                        <textarea id="form_message" name="pesan" class="form-control"
                                            placeholder="Silahkan isi keperluan atau keterangan lainnya disini *" rows="4"
                                            required data-error="Silahkan isi pesan atau keterangan anda."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" class="btn btn-success btn-send"
                                        onclick="return confirm('Anda yakin ingin mengirim permintaan pembuatan Surat Online?')"
                                        value="Kirim Permohonan">
                                </div>
                                <div class="col-md-4">
                                    <input type="button" class="btn btn-info  " value="Kembali"
                                        onclick="window.history.back()">
                                </div>
                                {{-- <div class="col-md-6">
                                    <input type="button" class="btn btn-light btn-send" value="Kembali"
                                        onclick="window.history.back()">
                                </div> --}}
                            </div>

                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <p class="text-muted">
                                        <strong>*</strong> Mohon lengkapi form diatas
                                    </p>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection
