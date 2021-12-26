<!--SIDEBAR-->
<div class="col-lg-4">
    <div class="row mb-3">
        <div class="card bg-white rounded shadow-sm mb-3">
            <div class="card-header bg-blue text-light text-center">KEPALA DESA</div>
            <div class=" card-body">
                @foreach ($dataProfile as $itemProfile)
                    <img class="rounded-circle mx-auto d-block" src="{{ $itemProfile->photo_kepdes }}"
                        alt="Generic placeholder image" width="140" height="140">
                    <h5 class="text-center mt-2 mb-2"><b>{{ $itemProfile->kepala_desa }}</b></h5>
                    <p class="text-center">{{ $itemProfile->quotes }}</p>
                    {{-- <p><a class="btn btn-success mx-auto d-block" href="/sambutan" role="button">Baca
                        Selengkapnya
                        &raquo;</a></p> --}}
                @endforeach
            </div>
        </div>

        <div class="card bg-white rounded shadow-sm mb-3" style="width: 30rem">
            <div class="card-body">
                <div id='calendar'></div>
            </div>

        </div>


        <div class="card bg-white rounded shadow-sm" style="width: 30rem;">
            <div class="card-header bg-blue text-light"><b>LAPORAN WARGA</b> </div>
            <div class="card-body">

                <script>
                    $(document).ready(function() {
                        $(".owl-carousel").owlCarousel({

                            items: 1,
                            loop: false,
                            autoplay: true,
                            center: true,
                        });
                    });
                </script>
                @if (count($dataSidebar))
                    <div class="owl-carousel owl-theme owl-loaded">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                @foreach ($dataSidebar as $itemPengaduan)
                                    <div class="owl-item">
                                        <div class="row ">
                                            <div class="col">
                                                <p class="font-italic text-center">{{ $itemPengaduan->pesan }}</p>

                                                <h4 class="text-center text-success">{{ $itemPengaduan->nama }}
                                                </h4>
                                                <h5 class="text-success text-center">Contact:
                                                </h5>
                                                <p class="text-center">{{ $itemPengaduan->kontak }}
                                                </p>
                                                <img class="img-thumbnail img-pengaduan"
                                                    src="{{ asset('storage/photos/pengaduan/' . $itemPengaduan->photo) }}"
                                                    alt="Photo Pengaduan">

                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                @else
                    <div class="row text-center justify-content-center">
                        <h4 class="m-3 text-primary">TIDAK ADA LAPORAN</h4>
                        <p class="m-4">Belum ada laporan pengaduan warga yang masuk</p>
                    </div>
                @endif

                {{-- <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the
                        bulk                        of the card's content.</p> --}}

            </div>
        </div>

        <div class="card bg-white rounded shadow-sm mt-3">
            <div class="card-header bg-blue text-light"><b>TELP PENTING</b></div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-hover"
                        style="max-height: 300px; overflow: auto; display: inline-block;">
                        <thead>
                            <tr>
                                <th scope="col">Nama Instansi</th>
                                <th scope="col">Telepon</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($dataNomor as $itemNomorPenting)

                                <tr>
                                    <td>{{ $itemNomorPenting->nama }}</td>
                                    <td>{{ $itemNomorPenting->nomor }}</td>
                                </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>


        </div>


        <div class="card bg-white rounded shadow-sm mt-3">
            <div class="card-header bg-blue text-light"><b>MAP DESA</b> </div>
            <div class="card-body">

                @foreach ($dataProfile as $itemProfile)
                    {!! $itemProfile->map !!}
                @endforeach
            </div>
        </div>

    </div>
</div>
