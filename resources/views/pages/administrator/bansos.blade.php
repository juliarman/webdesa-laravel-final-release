@extends('pages.administrator.layout')


@section('main-content')


    <div class="container card card-body">




        <h1 class="___class_+?1___">Data Penerima <span class="text-success">Dana Bansos</span></h1>
        <hr>

        <div class="row">


            <div class="col-lg-auto">
                <form action="/bansos-admin" method="GET">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="No KTP...." name="search" aria-label="nama"
                            aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari Data<i
                                class="fa fa-search m-1"></i></button>
                    </div>
                </form>
            </div>


            <div class="col-lg-auto"><button class="btn btn-success mr-2 mb-3" data-toggle="modal"
                    data-target="#inputPenerimaModal">Input
                    Penerima<i class="fa fa-address-book m-1"></i></button></div>

            <div class="col-lg-auto"><button class="btn btn-warning mr-2 mb-3" data-toggle="modal"
                    data-target="#tambahKategoriBantuanModal">Add Kategori<i class="fa fa-list-alt m-1"></i></button>
            </div>

            <div class="col-lg-auto">
                <button class="btn btn-info mr-2 mb-3" data-toggle="modal" data-target="#listKategoriBantuanModal">List
                    Kategori<i class="fa fa-people-arrows m-1"></i></button>
            </div>


            <form action="/bansos-admin" method="post">
                {{ csrf_field() }}
                <div class="modal fade" id="inputPenerimaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">DATA PENERIMA BANSOS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="nama" class="col-form-label">Nama:</label>
                                            <input type="text" class="form-control" name="nama">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="kota" class="col-form-label">Kabupaten/Kota:</label>
                                            <input type="text" list="kota" class="form-control" name="kota">

                                            <datalist id="kota">
                                                @foreach ($dataKota as $itemKota)
                                                    <option value="{{ $itemKota->nama_kota }}">
                                                @endforeach
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="kk" class="col-form-label">No KK:</label>
                                            <input type="number" class="form-control" name="kk">
                                        </div>

                                        <div class="col">
                                            <label for="ktp" class="col-form-label">No KTP:</label>
                                            <input type="number" class="form-control" name="ktp">
                                        </div>

                                        <div class="col">
                                            <label for="dusun" class="col-form-label">No Rekening:</label>
                                            <input type="text" class="form-control" name="norekening">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="alamat" class="col-form-label">Alamat Lengkap:</label>
                                            <input type="text" class="form-control" name="alamat">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="provinsi" class="col-form-label">Provinsi:</label>
                                            <input type="text" list="provinsi" class="form-control" name="provinsi">

                                            <datalist id="provinsi">
                                                @foreach ($dataProvinsi as $itemProvinsi)
                                                    <option value="{{ $itemProvinsi->nama_provinsi }}">
                                                @endforeach
                                            </datalist>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="kecamatan" class="col-form-label">Kecamatan:</label>
                                            <input type="text" class="form-control" name="kecamatan">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="kelurahan" class="col-form-label">Kelurahan:</label>
                                            <input type="text" class="form-control" name="kelurahan">


                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="nohp" class="col-form-label">No HP:</label>
                                    <input type="text" class="form-control" name="nohp">
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="nort" class="col-form-label">No RT:</label>
                                            <input type="text" class="form-control" name="nort">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="norw" class="col-form-label">No RW:</label>
                                            <input type="text" class="form-control" name="norw">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="cif" class="col-form-label">CIF:</label>
                                            <input type="text" class="form-control" name="cif">
                                        </div>
                                        <div class="col-sm-3">
                                            <label for="reg" class="col-form-label">REG:</label>
                                            <input type="text" class="form-control" name="reg">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="nokartux" class="col-form-label">No Kartu:</label>
                                            <input type="text" class="form-control" name="nokartux">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="namaarea" class="col-form-label">Nama Area:</label>
                                            <input type="text" class="form-control" name="namaarea">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="kocab" class="col-form-label">KOCAB:</label>
                                            <input type="text" class="form-control" name="kocab">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" placeholder="Keterangan Bansos" name="keterangan"
                                        style="height: 100px"></textarea>

                                </div>

                                <div class="form-group">
                                    <label for="jenis_bantuan">Kategori Bantuan</label>
                                    <select class="form-select" name="jenis_bantuan" required>
                                        <option selected disabled>Pilih Kategori Bantuan...</option>
                                        @foreach ($kategoriBansos as $item)
                                            <option value="{{ $item->kategori_bansos }}">{{ $item->kategori_bansos }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="status">Status Dana Bantuan</label>
                                    <div class="form-check m-2">
                                        <label class="form-check-label">
                                            <input class="form-check-input radio-inline" type="radio" name="status"
                                                value="Selesai" required>
                                            Selesai</label>
                                    </div>

                                    <div class="form-check m-2"><label class="form-check-label">
                                            <input class="form-check-input radio-inline" type="radio" name="status"
                                                value="Belum Selesai" required>
                                            Belum Selesai</label>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <form action="/bansos-admin/kategori" method="post">
                {{ csrf_field() }}
                <div class="modal fade" id="tambahKategoriBantuanModal" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">TAMBAH KATEGORI BANSOS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="kategori" class="col-form-label">Nama Kategori:</label>
                                    <input type="text" class="form-control" name="kategori" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Simpan Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>



            <div class="modal fade" id="listKategoriBantuanModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                style="max-height: 40em" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">TAMBAH KATEGORI BANSOS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <ul class="list-group">
                                @foreach ($kategoriBansos as $itemKategoriBansos)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $itemKategoriBansos->kategori_bansos }}
                                        <span class="badge">
                                            <form action="/bansos-admin/{{ $itemKategoriBansos->jbansos_id }}"
                                                method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                    class="btn btn-danger m-1">Hapus</button>
                                            </form>
                                        </span>
                                    </li>
                                @endforeach

                            </ul>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>





            @if (session('message'))
                <div data-dismiss="alert" class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>BERHASIL!</strong> {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('status'))
                <div data-dismiss="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>TERHAPUS!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                </thead>
                <tbody>


                    @if (count($listBansos))
                        <tr class="text-center">

                            <th scope="col ">Nama</th>
                            <th scope="col">Nomor KK</th>
                            <th scope="col">Nomor KTP</th>
                            <th scope="col">No Handphone/WA</th>
                            <th scope="col">Kategori Bantuan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>



                        @foreach ($listBansos as $itemBansos)

                            <form action="/bansos-admin/edit/{{ $itemBansos->bansos_id }}" method="post">
                                {{ csrf_field() }}
                                <div class="modal fade" id="editPenerimaModal{{ $itemBansos->bansos_id }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">DATA PENERIMA BANSOS</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label for="nama" class="col-form-label">Nama:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->nama }}" name="nama">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="kota"
                                                                class="col-form-label">Kabupaten/Kota:</label>
                                                            <input type="text" list="kota"
                                                                value="{{ $itemBansos->nama_kabupaten }}"
                                                                class="form-control" name="kota">

                                                            <datalist id="kota">
                                                                @foreach ($dataKota as $itemKota)
                                                                    <option value="{{ $itemKota->nama_kota }}">
                                                                @endforeach
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="kk" class="col-form-label">No KK:</label>
                                                            <input type="number" value="{{ $itemBansos->no_kk }}"
                                                                class="form-control" name="kk">
                                                        </div>

                                                        <div class="col">
                                                            <label for="ktp" class="col-form-label">No KTP:</label>
                                                            <input type="number" value="{{ $itemBansos->no_ktp }}"
                                                                class="form-control" name="ktp">
                                                        </div>

                                                        <div class="col">
                                                            <label for="norekening" class="col-form-label">No
                                                                Rekening:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->no_rekening }}" name="norekening">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label for="alamat" class="col-form-label">Alamat
                                                                Lengkap:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->alamat }}" name="alamat">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="provinsi" class="col-form-label">Provinsi:</label>
                                                            <input type="text" list="provinsi"
                                                                value="{{ $itemBansos->nama_provinsi }}"
                                                                class="form-control" name="provinsi">

                                                            <datalist id="provinsi">
                                                                @foreach ($dataProvinsi as $itemProvinsi)
                                                                    <option value="{{ $itemProvinsi->nama_provinsi }}">
                                                                @endforeach
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label for="kecamatan"
                                                                class="col-form-label">Kecamatan:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->nama_kecamatan }}"
                                                                name="kecamatan">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="kelurahan"
                                                                class="col-form-label">Kelurahan:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->nama_kelurahan }}"
                                                                name="kelurahan">


                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="nohp" class="col-form-label">No HP:</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $itemBansos->no_hp }}" name="nohp">
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label for="nort" class="col-form-label">No RT:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->no_rt }}" name="nort">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="norw" class="col-form-label">No RW:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->no_rw }}" name="norw">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="cif" class="col-form-label">CIF:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->cif }}" name="cif">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="reg" class="col-form-label">REG:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->reg }}" name="reg">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="nokartux" class="col-form-label">No Kartu:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->no_kartu }}" name="nokartux">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label for="namaarea" class="col-form-label">Nama Area:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->nama_area }}" name="namaarea">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label for="kocab" class="col-form-label">KOCAB:</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $itemBansos->kocab }}" name="kocab">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan</label>
                                                    <textarea class="form-control" placeholder="Keterangan Bansos"
                                                        name="keterangan"
                                                        style="height: 100px">{{ $itemBansos->keterangan }}</textarea>

                                                </div>

                                                <div class="form-group">
                                                    <label for="jenis_bantuan">Kategori Bantuan</label>
                                                    <select class="form-select" name="jenis_bantuan" required>
                                                        <option selected disabled>Pilih Kategori Bantuan...</option>
                                                        @foreach ($kategoriBansos as $item)
                                                            <option value="{{ $item->kategori_bansos }}">
                                                                {{ $item->kategori_bansos }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="status">Status Dana Bantuan</label>
                                                    <div class="form-check m-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input radio-inline" type="radio"
                                                                name="status" value="Selesai" required>
                                                            Selesai</label>
                                                    </div>

                                                    <div class="form-check m-2"><label class="form-check-label">
                                                            <input class="form-check-input radio-inline" type="radio"
                                                                name="status" value="Belum Selesai" required>
                                                            Belum Selesai</label>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Simpan Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <tr class="text-center">
                                <td>{{ $itemBansos->nama }}</td>
                                <td>{{ $itemBansos->no_kk }}</td>
                                <td>{{ $itemBansos->no_ktp }}</td>
                                <td>{{ $itemBansos->no_hp }}</td>
                                <td>{{ $itemBansos->jenis_bantuan }}</td>
                                @if ($itemBansos->status == 'Selesai')
                                    <td class="text-success">Selesai</td>
                                @elseif($itemBansos->status == 'Belum Selesai')
                                    <td class="text-danger">Belum Selesai</td>
                                @endif
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-success m-1 " data-toggle="modal"
                                            data-target="#editPenerimaModal{{ $itemBansos->bansos_id }}">Edit</button>

                                        <form action="/bansos-admin/delete/{{ $itemBansos->bansos_id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                                class="btn btn-danger m-1">Hapus</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>

                        @endforeach
                    @else
                        <div data-dismiss="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>DATA TIDAK ADA!</strong> Data penerima bansos tidak ada atau belum di input
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif







                    {{-- <div data-dismiss="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>DATA TIDAK ADA!</strong> Data Penduduk Tidak Ada Atau Belum Di Input!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}



                </tbody>
            </table>







        </div>


        {{-- {{ $penduduk->links('layouts.paginator') }} --}}



        {{-- <small class="d-block text-end mt-2 justify-content-center d-flex">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{ $penduduk->previousPageUrl() }}"
                            id="custom-paging-previous">Sebelumnya</a>
                    </li>


                    <li class="page-item"><a class="page-link" href="{{ $penduduk->nextPageUrl() }}"
                            id="custom-paging-next">Selanjutnya</a>
                    </li>
                </ul>
            </nav>
        </small> --}}



    </div>


@endsection
