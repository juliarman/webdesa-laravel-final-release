@extends('layouts.app')

@section('pengaduan')


    <div class="container">


        <div class="row justify-content-center d-flex">
            <div class="col-lg-9">
                <div class="card">

                    <div class="card-header">
                        <h2 class="text-center"><b>PENGADUAN <span class="text-success">TERKIRIM</span></b></h2>

                        <p class="text-center">Hasil pengaduan akan tampil di halaman dashboard website apabila telah di
                            setujui
                            Admin :-)</p>
                    </div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js">
                            </script>
                            <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_otgqiwtw.json"
                                background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                            </lottie-player>
                        </div>
                        <div class="row justify-content-center">
                            Pengaduan Terkirim....
                        </div>
                    </div>



                </div>
            </div>
        </div>


    </div>


@endsection
