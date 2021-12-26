@extends('layouts.app')


@section('title', 'Bansos Penduduk | Halaman Bansos Penduduk')

@section('penduduk')

    <div class="container card card-body">

        <h1 class="display-6">Bansos Penduduk</h1>

        <p class="bg-light p-3"><small class="text-danger font-weight-bold">KETERANGAN:</small> Masukkan No KTP untuk
            mengecek status penerima Dana / Sembako Bansos!</p>
        <hr>

        <div class="row">

            <div class="col-lg-5">
                <form action="/bansos" method="GET">
                    <div class="input-group mb-3">
                        <input type="number" required oninvalid="setCustomValidity('Masukka 16 digit nomor KTP anda!')"
                            class="form-control" placeholder="No KTP...." name="checking" aria-describedby="button-addon2">

                        <button class="btn btn-primary" type="submit" id="button-addon2">Cek Penerima Bansos</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-auto">
                <a href="/bansos"><button class="btn btn-success">Reset Data</button></a>
            </div>

        </div>


        @if (isset($dataBansos))
            <div class="row">
                @if (count($dataBansos) > 0)
                    @foreach ($dataBansos as $itemBansos)
                        @if ($itemBansos->status == 'Selesai')


                            <div class="container">

                                <div class="alert alert-info" role="alert">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="alert-heading font-weight-bold">Selamat!</h4>
                                            <p>Penerima Bantuan Atas Nama <b>{{ $itemBansos->nama }}</b> Telah Selesai
                                                Tersalurkan!
                                            </p>
                                            <p>Semoga bantuannya bermanfaat :)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @elseif($itemBansos->status == 'Belum Selesai')

                            <div class="container">
                                <div class="alert alert-success" role="alert">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4 class="alert-heading">Selamat!</h4>
                                            <p>Anda terdaftar sebagai penerima dana bantuan berupa uang/sembako. Untuk
                                                langkah
                                                selanjutnya, anda
                                                diharapkan
                                                membawa
                                                fotocopy KTP
                                                &
                                                Kartu Keluarga ke Kantor Desa!</p>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-header">
                                            <h4>Detail Penerima</h4>
                                        </div>

                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="nama" class="font-weight-bold">Nama
                                                        <h5>{{ $itemBansos->nama }}</h5>
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="kota" class="font-weight-bold">Kabupaten/Kota
                                                        <h5>{{ $itemBansos->nama_kabupaten }}</h5>
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="kk" class="font-weight-bold">Kecamatan
                                                        <h5>{{ $itemBansos->nama_kecamatan }}</h5>
                                                    </label>
                                                </div>


                                                <div class="col-md-2">
                                                    <label for="kk" class="font-weight-bold">Alamat Lengkap
                                                        <h5>{{ $itemBansos->alamat }}</h5>
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="kk" class="font-weight-bold">No Rekening
                                                        <h5>{{ $itemBansos->no_rekening }}</h5>
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="kk" class="font-weight-bold">CIF
                                                        <h5>{{ $itemBansos->cif }}</h5>
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="jenisBantuan" class="font-weight-bold">Jenis Bantuan
                                                        <h5>{{ $itemBansos->jenis_bantuan }}</h5>
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="noKartu" class="font-weight-bold">Nomor Kartu
                                                        <h5>{{ $itemBansos->no_kartu }}</h5>
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="noKartu" class="font-weight-bold">KOCAB
                                                        <h5>{{ $itemBansos->kocab }}</h5>
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="noKartu" class="font-weight-bold">Nama Area
                                                        <h5>{{ $itemBansos->nama_area }}</h5>
                                                    </label>
                                                </div>


                                                <div class="col-md-2">
                                                    <label for="noKartu" class="font-weight-bold">Nomor HP
                                                        <h5>{{ $itemBansos->no_hp }}</h5>
                                                    </label>
                                                </div>

                                                <div class="col-md-2">
                                                    <label for="noKartu" class="font-weight-bold">REG
                                                        <h5>{{ $itemBansos->reg }}</h5>
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="row mt-4">
                                                <div class="col-sm-7">
                                                    <div class="form-group bg-light p-2 shadow rounded">
                                                        <label for="noKartu" class="font-weight-bold">Keterangan</label>
                                                        <p>{{ $itemBansos->keterangan }}</p>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        @endif

                    @endforeach

                @else
                    <div class="container">

                        <div class="alert alert-danger" role="alert">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="alert-heading">Mohon Maaf!</h4>
                                    <p>Anda tidak terdaftar sebagai penerima dana bansos!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif

            </div>

        @endif




    </div>


@endsection
