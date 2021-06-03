@extends('layouts.app')


@section('pengaduan')


    <div class="container">


        <div class="row justify-content-center d-flex">
            <div class="col-lg-9">
                <div class="card">

                    <div class="card-header">
                        <h2 class="text-center"><b>FORM PENGADUAN</b></h2>

                        <p class="text-center">Silahkan lengkapi form di bawah untuk melakukan pengaduan!</p>
                    </div>

                    <form action="/pengaduan" method="post">
                        {{ csrf_field() }}
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Subjek</label>
                                <input type="text" name="subjek" class="form-control" id="exampleFormControlInput1"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Pesan Pengaduan</label>
                                <textarea class="form-control" name="pesan" id="exampleFormControlTextarea1" rows="3"
                                    required></textarea>
                            </div>



                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">No Hp atau WA</label>
                                        <input type="text" name="kontak" class="form-control" id="exampleFormControlInput1"
                                            required>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="card-footer p-4 bg-white">
                            <div class="row justify-content-center">
                                <button class="btn btn-success">KIRIM PENGADUAN</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>



@endsection
