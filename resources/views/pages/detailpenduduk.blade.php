@extends('layouts.app')

@section('title', 'Data Penduduk')


@section('detail-penduduk')


    <div class="container card card-body">

        <h1 class="text-center">Detail Penduduk</h1>

        <div class="row justify-content-center d-flex">
            <div class="col-lg-3 text-center">
                <img src="{{ $id->getImages() }}" alt="" class="rounded-circle m-2" height="140" width="140">
                <h5 class="text-center"><b>{{ $id->nama }}</b></h5>
                <p class="text-center">{{ $id->pekerjaan }}</p>
            </div>

            <div class="col-lg-9 mt-5">
                <div class="table-responsive">

                    <table class="table table-hover">

                        <tbody>
                            <tr>
                                <th scope="row">No Hp</th>
                                @if ($id->no_hp == null)
                                    <td>-Belum Diisi-</td>
                                @else
                                    <td>{{ $id->no_hp }}</td>
                                @endif
                                <th>Tanggal Lahir</th>
                                <td>{{ $id->tgl_lahir->translatedFormat('jS F Y') }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat Lengkap</th>
                                <td>{{ $id->alamat }}</td>
                                <th>Jenis Kelamin</th>
                                <td>{{ $id->kelamin }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Pekerjaan</th>
                                <td>{{ $id->pekerjaan }}</td>
                                <th>Agama</th>
                                <td>{{ $id->agama }}</td>
                            </tr>

                            <tr>
                                <th scope="row">Umur</th>
                                <td>{{ $id->tgl_lahir->age }} Tahun</td>
                                <th>Tempat Lahir</th>
                                <td>{{ $id->tempat_lahir }}</td>
                            </tr>


                            <tr>
                                <th scope="row">Status Perkawinan</th>
                                <td>{{ $id->status_perkawinan }}</td>

                                <th>Keterangan</th>
                                @if ($id->keterangan != null)
                                    <td>{{ $id->keterangan }}</td>
                                @else
                                    <td>-Belum Diisi-</td>
                                @endif
                            </tr>


                            <tr>
                                <th class="w-25">Pendidikan Terakhir</th>
                                <td>{{ $id->pendidikan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


@endsection
