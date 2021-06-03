@extends('layouts.app')


@section('breadcrumb')
    {{ Breadcrumbs::render('surat') }}
@endsection

@section('surat')


    <div class="container">
        <div class="row">

            <div class="card card-body">
                <div class="col-xl-8 offset-xl-2 py-5">

                    <h1 style="text-align: center">
                        <p>Pelayanan Surat Online</p>
                        <a href="#" style="color:#28a745">Desa Suka Maju</a>
                    </h1>

                    <p class="lead">Silahkan lengkapi form untuk pengurusan surat online</p>


                    <form action="/surat" id="contact-form" method="post" role="form">

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
                                    <input type="submit" class="btn btn-success btn-send" value="Kirim Permohonan">
                                </div>
                                <div class="col-md-4">
                                    <input type="button" class="btn btn-danger  " value="Kembali"
                                        onclick="window.history.back()">
                                </div>
                                {{-- <div class="col-md-6">
                                    <input type="button" class="btn btn-light btn-send" value="Kembali"
                                        onclick="window.history.back()">
                                </div> --}}
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted">
                                        <strong>*</strong> Harus diisi
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
