@extends('pages.administrator.layout')


@section('main-content')


    <div class="container">
        <div class="card card-body rounded shadow-sm mb-3 woah fadeIn">
            <h1 style="color: #28a745">DETAIL SURAT</h1>
            <p class="lead">Detail informasi permintaan pembuatan surat</p>

            <div class="row">
                <div class="col-md-8">

                    <div class="card-body">
                        <table class="table table-striped">

                            <tr class="table-primary">
                            <tr>
                                <td class="table-dark" style="width: 120px">Nama :</td>
                                <td class="table-secondary">{{ $id->nama }}</td>
                            </tr>

                            <tr>
                                <td class="table-dark" style="width: 120px">NIK :</td>
                                <td class="table-secondary">{{ $id->nik }}</td>
                            </tr>

                            <tr>
                                <td class="table-dark" style="width: 120px">No HP :</td>
                                <td class="table-secondary">{{ $id->no_hp }}</td>
                            </tr>

                            <tr>
                                <td class="table-dark" style="width: 120px">Alamat Lengkap :</td>
                                <td class="table-secondary">{{ $id->alamat_lengkap }}</td>
                            </tr>
                            <tr>
                                <td class="table-dark" style="width: 120px">Agama :</td>
                                <td class="table-secondary">{{ $id->agama }}</td>
                            </tr>
                            <tr>
                                <td class="table-dark" style="width: 120px">J.Kelamin :</td>
                                <td class="table-secondary">{{ $id->kelamin }}</td>
                            </tr>

                            <tr>
                                <td class="table-dark" style="width: 120px">Pekerjaan :</td>
                                <td class="table-secondary">{{ $id->pekerjaan }}</td>
                            </tr>

                            <tr>
                                <td class="table-dark" style="width: 120px">Tempat Tgl Lahir :</td>
                                <td class="table-secondary">{{ $id->ttl }}</td>
                            </tr>

                            <tr>
                                <td class="table-dark" style="width: 120px">Umur :</td>
                                <td class="table-secondary">{{ $id->umur }}</td>
                            </tr>

                            <tr>
                                <td class="table-dark" style="width: 120px">Jenis Surat :</td>
                                <td class="table-secondary">{{ $id->jenis_surat }}</td>
                            </tr>

                            <tr>
                                <td class="table-dark" style="width: 120px">Permintaan Masuk :</td>
                                <td class="table-secondary">{{ $id->created_at }}</td>
                            </tr>

                            <tr>
                                <td class="table-dark" style="width: 120px">Photo Berkas Pendukung 1</td>
                                <td class="table-secondary">
                                    <img src="{{ asset('storage/photos/surat/' . $id->photo_berkas_pendukung_1) }}"
                                        width="200" alt="">
                                </td>
                            </tr>

                            <tr>
                                <td class="table-dark" style="width: 120px">Photo Berkas Pendukung 2</td>
                                <td class="table-secondary">
                                    <img src="{{ asset('storage/photos/surat/' . $id->photo_berkas_pendukung2) }}"
                                        width="200" alt="">
                                </td>
                            </tr>
                        </table>

                    </div>
                    <span style="color: #28a745">Pesan :</span>
                    <p style="font-style: italic">{{ $id->pesan }}</p>

                </div>


            </div>

        </div>







    </div>

    </div>


@endsection
