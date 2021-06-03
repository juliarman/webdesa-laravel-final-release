@extends('layouts.app')


@section('profile')
    <div class="col-lg-8 mb-3">
        <div class="row bg-dark mb-4 mr-0 ml-0 p-2 rounded shadow text-light">
            <h3>PROFIL DESA</h3>
        </div>

        <div class="row">



            @foreach ($profile as $itemProfile)
                <div class="col-md-12">
                    <div class="card bg-white rounded shadow-sm mb-3 woah fadeIn">

                        <div class="card-body">
                            {!! $itemProfile->isi_konten !!}
                        </div>
                    </div>
                </div>
            @endforeach



        </div>









    </div>

    @include('includes.sidebar', [
    'dataSidebar'=> $data,
    'dataNomor'=> $nopenting,
    'dataProfile' => $profile,

    ])

@endsection
