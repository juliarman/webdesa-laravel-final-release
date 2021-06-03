@extends('pages.administrator.layout')


@section('main-content')


    <div class="container">


        <div class="card card-body">
            <h1 style="color: #28a745">FORM AGENDA</h1>
            <p class="lead">Lengkapi form detail Agenda di bawah!</p>

            <div class="container">


                <form action="/agenda-admin/add" method="post">

                    {{ csrf_field() }}
                    <input class="form-control mt-2 mb-2" name="judul" type="text" placeholder="JUDUL AGENDA"
                        aria-label="Judul" required>

                    <input class="form-control mt-2 mb-2" name="tempat" type="text" placeholder="TEMPAT / LOKASI"
                        aria-label="lokasi" required>

                    <div class="row">
                        <div class="col-6">
                            <input class="form-control mt-2 mb-2" name="waktu" type="text" placeholder="WAKTU"
                                aria-label="waktu" required>
                        </div>
                        <div class="col-6">
                            <input class="form-control mt-2 mb-2" disabled type="text"
                                placeholder="Contoh: Pukul 18:30 - Selesai" aria-label="waktu" required>
                        </div>
                    </div>

                    <div class="input-group mt-2 mb-2">

                        <input type="text" id="tanggal" name="tanggal" class="form-control"
                            placeholder="PILIH TANGGAL AGENDA" required>
                    </div>
                    <span class="glyphicon glyphicon-calendar"></span>

                    <script type="text/javascript">
                        $('#tanggal').datepicker({
                            format: 'dd-mm-yyyy',

                        });

                    </script>

                    <div class="form-group">
                        <label for="keteranga">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                    </div>


                    <button type="submit" class="btn btn-success"
                        onclick="return confirm('Anda yakin ingin menyimpan data ini?')">BUAT AGENDA</button>
                </form>


            </div>

        </div>

    </div>


@endsection
