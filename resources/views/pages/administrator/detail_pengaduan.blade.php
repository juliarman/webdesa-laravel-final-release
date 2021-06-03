@extends('pages.administrator.layout')


@section('main-content')


    <div class="container">
        <div class="card card-body">
            <h1 style="color: #28a745">DETAIL PENGADUAN</h1>
            <p class="lead">Informasi Detail Pengaduan Warga</p>


            <form action="/approve-pengaduan/{{ $pengaduan->pengaduan_id }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-dark" id="inputGroup-sizing-default">Subjek</span>
                        <input type="text" class="form-control" readonly name="subjek" value="{{ $pengaduan->subjek }}">
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-dark" id="inputGroup-sizing-default">Pelapor</span>
                                <input type="text" class="form-control" readonly name="nama"
                                    value="{{ $pengaduan->nama }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-dark" id="inputGroup-sizing-default">Kontak</span>
                                <input type="text" class="form-control" readonly name="kontak"
                                    value="{{ $pengaduan->kontak }}">
                            </div>
                        </div>

                    </div>



                    <div class="input-group mb-3">
                        <span class="input-group-text bg-dark">Pesan</span>
                        <textarea class="form-control" readonly name="pesan">{{ $pengaduan->pesan }}</textarea>
                    </div>



                </div>
                <button type="submit" class="btn btn-success"
                    onclick="return confirm('Anda yakin ingin menyetujui pengaduan?')">SETUJUI PENGADUAN</button>
            </form>

        </div>

    </div>


@endsection
