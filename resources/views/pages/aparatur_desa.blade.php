@extends('layouts.app')



@section('main-content')
    <div class="container">
        <div class="card">
            <div class="card-header justify-content-center d-flex bg-dark text-light">
                <h2>APARATUR DESA</h2>
            </div>

            <script>
                AOS.init();

            </script>
            <div class="card-body">

                <div class="row justify-content-center">
                    @foreach ($kepdes as $item)

                        <div class="col-sm m-3 text-center" data-aos="zoom-in">
                            <img src="{{ $item->photo }}" alt="" class="rounded-circle m-2" width="140" height="140">
                            <h5><b>{{ $item->nama }}</b></h5>
                            <p>{{ $item->jabatan }}</p>
                        </div>
                    @endforeach
                </div>


                <div class="row justify-content-center">

                    @foreach ($filter as $itemAparatur)
                        <div class="col-sm-2 m-3 text-center" data-aos="zoom-in">
                            <img src=" {{ $itemAparatur->photo }}" alt="" class="rounded-circle m-2" width="140"
                                height="140">
                            <h5><b>{{ $itemAparatur->nama }}</b></h5>
                            <p>{{ $itemAparatur->jabatan }}</p>
                        </div>
                    @endforeach



                </div>




            </div>
        </div>
    </div>
@endsection
