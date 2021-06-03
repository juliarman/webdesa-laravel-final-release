@extends('layouts.app')


@section('detail-penduduk')


    <div class="container card card-body">

        <h1 class="text-center">Detail Penduduk</h1>

        <div class="row justify-content-center d-flex">
            <div class="col-lg-3 text-center">
                <img src="{{ $id->photo }}" alt="" class="rounded-circle m-2" height="140" width="140">
                <h5 class="text-center"><b>{{ $id->nama }}</b></h5>
                <p class="text-center">{{ $id->pekerjaan }}</p>
            </div>

            <div class="col-lg-9 mt-5">
                <div class="table-responsive">

                    <table class="table table-hover">

                        <tbody>
                            <tr>
                                <th scope="row">No Hp</th>
                                <td>{{ $id->no_hp }}</td>
                                <th>Tempat & Tgl Lahir</th>
                                <td>{{ $id->tempat_lahir }} {{ $id->tgl_lahir }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


@endsection
