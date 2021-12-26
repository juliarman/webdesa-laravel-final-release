@extends('layouts.app')



@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header justify-content-center d-flex bg-blue text-light">
                <h2>APARATUR DESA</h2>
            </div>

            <script>
                AOS.init();
            </script>
            <div class="card-body">

                <div class="row justify-content-center">
                    @foreach ($kepdes as $item)

                        <div class="col-sm-auto m-3 text-center" data-aos="zoom-in">
                            <div class="card-body shadow">
                                <img src="{{ $item->photo }}" alt="" class="rounded-circle m-2" width="140" height="140">
                                <h5><b>{{ $item->nama }}</b></h5>
                                <p>{{ $item->jabatan }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="row justify-content-start">

                    @foreach ($filter as $itemAparatur)
                        <div class="col-sm-3 d-flex mt-3" data-aos="zoom-in">
                            <div class="card card-body flex-fill shadow d-flex align-items-center">
                                <img src=" {{ $itemAparatur->photo }}" alt="" class="rounded-circle m-2" width="140"
                                    height="140">
                                <h5 class="text-center"><b>{{ $itemAparatur->nama }}</b></h5>
                                <p class="text-center">{{ $itemAparatur->jabatan }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>




            </div>
        </div>
    </div>
@endsection
