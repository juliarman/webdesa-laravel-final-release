@extends('layouts.app')


@section('profile')
    <div class="col-lg-8 mb-3">
        <div class="row bg-dark mb-4 mr-0 ml-0 p-2 rounded shadow text-light">
            <h3>VISI & MISI</h3>
        </div>

        <div class="row">


            <div class="col-md-12">
                <div class="card bg-white rounded shadow-sm mb-3 woah fadeIn">

                    <div class="card-body">
                        {!! $visiMisi->content !!}
                    </div>
                </div>
            </div>




        </div>









    </div>

    @include('includes.sidebar', [
    'dataSidebar'=> $data,
    'dataNomor'=> $nopenting,
    'dataProfile' => $profile,

    ])

@endsection
