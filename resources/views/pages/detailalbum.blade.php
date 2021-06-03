@extends('layouts.app')


@section('detail-album')


    <div class="container main-container mr-4 ml-4">
        <div class="row bg-success p-3 justify-content-center">
            <h3 class="text-light">Album Kegiatan Pembukaan Lomba Baca Tulis Al-Quran</h3>
        </div>
    </div>
    <div class="container main-container">

        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center d-flex text-center">

                    @foreach ($detail as $item)

                        <div class="col-lg-4 ">
                            <div class="card-body rounded shadow">
                                <img src="{{ $detail->image }}" alt="" height="210" width="300">
                                <button type="button" class="btn btn-danger mt-3 " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    LIHAT PHOTO
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Proses Kegiatan Pembersihan
                                                    Masjid IstiQlal</h5>

                                            </div>
                                            <div class="modal-body">
                                                <img src="/storage/photos/1/cara download video youtube.jpg" height="550"
                                                    alt="">
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" data-bs-dismiss="modal"
                                                    class="btn btn-success">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endforeach






                </div>
            </div>
        </div>
    </div>

@endsection
