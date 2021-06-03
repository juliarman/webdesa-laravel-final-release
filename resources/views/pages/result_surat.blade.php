@extends('layouts.app')


@section('surat')

    <div class="container">
        <div class="row">

            <div class="card card-body">
                <div class="col-xl-8 offset-xl-2 py-5">

                    <h1 style="text-align: center">
                        <p>Permintaan pembuatan Surat berhasil terkirim!</p>

                    </h1>

                    <div class="row justify-content-center">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets6.lottiefiles.com/private_files/lf30_odansovk.json"
                            background="transparent" speed="1" mode="bounce" style="width: 200px; height: 200px;" autoplay>
                        </lottie-player>
                    </div>
                    <div class="col-md-12">
                        <div class="card bg-white rounded shadow-sm mb-3 woah fadeIn">
                            <div class="card-header bg-green text-light">
                                <h3>DETAIL SURAT</h3>
                            </div>

                            <div class="card-body">
                                <table class="table table-striped">

                                    <tr class="table-primary">
                                    <tr>
                                        <td class="table-dark" style="width: 120px">Nama :</td>
                                        <td class="table-secondary">{{ $newSurat->nama }}</td>
                                    </tr>

                                    <tr>
                                        <td class="table-dark" style="width: 120px">Nik :</td>
                                        <td class="table-secondary">{{ $newSurat->nik }}</td>
                                    </tr>

                                    <tr>
                                        <td class="table-dark" style="width: 120px">No Hp :</td>
                                        <td class="table-secondary">{{ $newSurat->no_hp }}</td>
                                    </tr>

                                    <tr>
                                        <td class="table-dark" style="width: 120px">J.Surat :</td>
                                        <td class="table-secondary">{{ $newSurat->jenis_surat }}</td>
                                    </tr>
                                    <tr>
                                        <td class="table-dark" style="width: 120px">Pesan :</td>
                                        <td class="table-secondary">{{ $newSurat->pesan }}</td>
                                    </tr>

                                </table>








                            </div>







                        </div>
                    </div>









                </div>












                <div class="card-footer">
                    <p><b class="text-danger">Note</b> pembuatan surat berlangsung beberapa hari, tergantung jumlah antrian,
                        Anda akan
                        menerima
                        informasi proses pembuatan surat melalui no HP yang anda cantumkan sebelumnya!</p>
                </div>

            </div>

        </div>

    </div>
    </div>
    </div>

@endsection
