@extends('pages.administrator.layout')


@section('main-content')



    <div class="container">


        <div class="card card-body">
            <h1 style="color: #28a745">EDIT DATA PENDUDUK</h1>
            <p class="lead">Selamat datang di halaman input penduduk</p>

            <form action="/edit-penduduk/{{ $edPenduduk->penduduk_id }}" method="post">

                {{ csrf_field() }}

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label for="namaLengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $edPenduduk->nama }}" name="nama"
                            id="NamaLengkap" placeholder="" value="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" value="{{ $edPenduduk->pekerjaan }}" name="pekerjaan"
                            id="pekerjaan">
                        <div class="invalid-feedback">
                            Valid pekerjaan is required.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="nkk">Nomor Induk Kependudukan (NIK)</label>
                        <input type="text" class="form-control" name="nik" id="nik" value="{{ $edPenduduk->no_nik }}">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="nkk">Nomor Kartu Keluarga (NKK)</label>
                        <input type="text" class="form-control" name="nkk" id="nkk" placeholder=""
                            value="{{ $edPenduduk->no_kk }}">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="country">Keterangan</label>
                        <select class="custom-select d-block w-100" name="keterangan">

                            <option value="" selected disabled>Pilih Keterangan Warga...</option>


                            <option value="Pindah Datang"
                                {{ $edPenduduk->keterangan == 'Pindah Datang' ? 'selected' : '' }}>Pindah Datang</option>




                            <option value="Pindah Keluar"
                                {{ $edPenduduk->keterangan == 'Pindah Keluar' ? 'selected' : '' }}>Pindah Keluar</option>




                            <option value="Warga Tetap" {{ $edPenduduk->keterangan == 'Warga Tetap' ? 'selected' : '' }}>
                                Warga Tetap</option>


                            <option value="Tanpa Keterangan"
                                {{ $edPenduduk->keterangan == 'Tanpa Keterangan' ? 'selected' : '' }}>Tanpa Keterangan
                            </option>

                        </select>
                        <div class="invalid-feedback">
                            Please select a valid keterangan.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="nohp">No HP</label>
                        <input type="text" class="form-control" name="nohp" id="nohp" value="{{ $edPenduduk->no_hp }}">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">

                        <label for="kodepos">Tanggal Lahir</label>
                        <div class="input-group">

                            <input type="text" id="tanggal" name="tanggal" class="form-control"
                                value="{{ $edPenduduk->tgl_lahir->format('m/d/Y') }}">
                        </div>
                        <span class="glyphicon glyphicon-calendar"></span>

                        <script type="text/javascript">
                            $('#tanggal').datepicker({
                                format: 'mm/dd/yyyy',

                            });
                        </script>
                        {{-- <script type="text/javascript">
                            $('#tanggal').datepicker({
                                format: 'dd-mm-yyyy',

                            });
                        </script> --}}
                        {{-- <label for="kodepos">Kode Pos</label>
                        <input type="number" class="form-control" id="kodepos" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div> --}}
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="country">Agama</label>
                        <select class="custom-select d-block w-100" name="agama" id="agama">
                            <option value="" selected disabled>Pilih Agama...</option>

                            <option value="ISLAM" {{ $edPenduduk->agama == 'ISLAM' ? 'selected' : '' }}>Islam</option>

                            <option value="KRISTEN" {{ $edPenduduk->agama == 'KRISTEN' ? 'selected' : '' }}>Kristen
                            </option>

                            <option value="KATOLIK" {{ $edPenduduk->agama == 'KATOLIK' ? 'selected' : '' }}>Katolik
                            </option>

                            <option value="HINDU" {{ $edPenduduk->agama == 'HINDU' ? 'selected' : '' }}>Hindu</option>

                            <option value="BUDDHA" {{ $edPenduduk->agama == 'BUDDHA' ? 'selected' : '' }}>Buddha</option>

                            <option value="KONG HU CU" {{ $edPenduduk->agama == 'KONG HU CU' ? 'selected' : '' }}>Kong Hu
                                Cu</option>

                            <option value="Tanpa Keterangan"
                                {{ $edPenduduk->agama == 'Tanpa Keterangan' ? 'selected' : '' }}>Tanpa Keterangan
                            </option>


                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>




                    <div class="col-md-4 mb-3">
                        <label for="country">Pendidikan Terakhir</label>
                        <select class="custom-select d-block w-100" name="pendidikan_terakhir" id="pendidikan">
                            <option value="" selected disabled>Pilih Pendidikan Terakhir...</option>

                            <option value="TAMAT SD / SEDERAJAT" {{ $edPenduduk->pendidikan == 'SD' ? 'selected' : '' }}>
                                TAMAT
                                SD / SEDERAJAT
                            </option>

                            <option value="BELUM TAMAT SD"
                                {{ $edPenduduk->pendidikan == 'BELUM TAMAT SD' ? 'selected' : '' }}>
                                BELUM TAMAT SD</option>


                            <option value="SLTP" {{ $edPenduduk->pendidikan == 'SLTP' ? 'selected' : '' }}>
                                SLTP/SEDERAJAT
                            </option>


                            <option value="SLTA" {{ $edPenduduk->pendidikan == 'SLTA' ? 'selected' : '' }}>SLTA
                                /
                                SEDERAJAT
                            </option>


                            <option value="DIPLOMA I" {{ $edPenduduk->pendidikan == 'DIPLOMA I' ? 'selected' : '' }}>
                                DIPLOMA I
                            </option>

                            <option value="DIPLOMA II" {{ $edPenduduk->pendidikan == 'DIPLOMA II' ? 'selected' : '' }}>
                                DIPLOMA II
                            </option>

                            <option value="DIPLOMA III" {{ $edPenduduk->pendidikan == 'DIPLOMA III' ? 'selected' : '' }}>
                                DIPLOMA III
                            </option>


                            <option value="DIPLOMA IV" {{ $edPenduduk->pendidikan == 'DIPLOMA IV' ? 'selected' : '' }}>
                                DIPLOMA IV
                            </option>


                            <option value="S1" {{ $edPenduduk->pendidikan == 'S1' ? 'selected' : '' }}>STRATA 1
                            </option>

                            <option value="S2" {{ $edPenduduk->pendidikan == 'S2' ? 'selected' : '' }}>STRATA 2
                            </option>

                            <option value="S3" {{ $edPenduduk->pendidikan == 'S3' ? 'selected' : '' }}>STRATA 3
                            </option>



                            <option value="TIDAK / BELUM SEKOLAH"
                                {{ $edPenduduk->pendidikan == 'TIDAK / BELUM SEKOLAH' ? 'selected' : '' }}>TIDAK
                                / BELUM
                                SEKOLAH</option>


                            <option value="Tanpa Keterangan"
                                {{ $edPenduduk->pendidikan == 'Tanpa Keterangan' ? 'selected' : '' }}>Tanpa
                                Keterangan
                            </option>


                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>



                    <div class="col-md-3 mb-3">
                        <label for="alamat">Alamat Lengkap</label>
                        <input type="text" class="form-control" name="alamat" id="alamat"
                            value="{{ $edPenduduk->alamat }}">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="tempatLahir">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempatLahir"
                            value="{{ $edPenduduk->tempat_lahir }}">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>



                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input radio-inline" type="radio" name="status"
                                        value="Masih Hidup" {{ $edPenduduk->status == 'Masih Hidup' ? 'checked' : '' }}>
                                    Masih Hidup</label>
                            </div>

                            <div class="form-check"><label class="form-check-label">
                                    <input class="form-check-input radio-inline" value="Meninggal"
                                        {{ $edPenduduk->status == 'Meninggal' ? 'checked' : '' }} type="radio"
                                        name="status">
                                    Meninggal</label>
                            </div>


                        </div>
                    </div>



                </div>


                <div class="row">


                    <div class="col-md-3 mb-3">
                        <label for="statusKeluarga">Status Keluarga</label>
                        <select class="custom-select d-block w-100" name="statusKeluarga">
                            <option value="" selected disabled>Pilih Status Keluarga...</option>


                            @if ($edPenduduk->status_keluarga == 'KK')
                                <option value="{{ $edPenduduk->status_keluarga }}" selected>
                                    {{ $edPenduduk->status_keluarga }}
                                </option>
                                <option value="ISTRI">ISTRI</option>
                                <option value="ANAK">ANAK</option>
                                <option value="FAMILI LAIN">FAMILI LAIN</option>
                                <option value="CUCU">CUCU</option>
                                <option value="MERTUA">MERTUA</option>
                                <option value="ORANG TUA">ORANG TUA</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>

                            @elseif($edPenduduk->status_keluarga == 'ISTRI')
                                <option value="{{ $edPenduduk->status_keluarga }}" selected>
                                    {{ $edPenduduk->status_keluarga }}
                                </option>
                                <option value="KK">KK</option>
                                <option value="ANAK">ANAK</option>
                                <option value="FAMILI LAIN">FAMILI LAIN</option>
                                <option value="CUCU">CUCU</option>
                                <option value="MERTUA">MERTUA</option>
                                <option value="ORANG TUA">ORANG TUA</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>

                            @elseif($edPenduduk->status_keluarga == 'ANAK')
                                <option value="{{ $edPenduduk->status_keluarga }}" selected>
                                    {{ $edPenduduk->status_keluarga }}
                                </option>

                                <option value="KK">KK</option>
                                <option value="ISTRI">ISTRI</option>
                                <option value="FAMILI LAIN">FAMILI LAIN</option>
                                <option value="CUCU">CUCU</option>
                                <option value="MERTUA">MERTUA</option>
                                <option value="ORANG TUA">ORANG TUA</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>

                            @elseif($edPenduduk->status_keluarga == 'FAMILI LAIN')
                                <option value="{{ $edPenduduk->status_keluarga }}" selected>
                                    {{ $edPenduduk->status_keluarga }}
                                </option>

                                <option value="KK">KK</option>
                                <option value="ISTRI">ISTRI</option>
                                <option value="ANAK">ANAK</option>
                                <option value="CUCU">CUCU</option>
                                <option value="MERTUA">MERTUA</option>
                                <option value="ORANG TUA">ORANG TUA</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>

                            @elseif($edPenduduk->status_keluarga == 'CUCU')
                                <option value="{{ $edPenduduk->status_keluarga }}" selected>
                                    {{ $edPenduduk->status_keluarga }}
                                </option>
                                <option value="KK">KK</option>
                                <option value="ISTRI">ISTRI</option>
                                <option value="ANAK">ANAK</option>
                                <option value="FAMILI LAIN">FAMILI LAIN</option>
                                <option value="MERTUA">MERTUA</option>
                                <option value="ORANG TUA">ORANG TUA</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>

                            @elseif($edPenduduk->status_keluarga == 'MERTUA')
                                <option value="{{ $edPenduduk->status_keluarga }}" selected>
                                    {{ $edPenduduk->status_keluarga }}
                                </option>
                                <option value="KK">KK</option>
                                <option value="ISTRI">ISTRI</option>
                                <option value="ANAK">ANAK</option>
                                <option value="FAMILI LAIN">FAMILI LAIN</option>
                                <option value="CUCU">CUCU</option>
                                <option value="ORANG TUA">ORANG TUA</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>

                            @elseif($edPenduduk->status_keluarga == 'ORANG TUA')
                                <option value="{{ $edPenduduk->status_keluarga }}" selected>
                                    {{ $edPenduduk->status_keluarga }}
                                </option>
                                <option value="KK">KK</option>
                                <option value="ISTRI">ISTRI</option>
                                <option value="ANAK">ANAK</option>
                                <option value="FAMILI LAIN">FAMILI LAIN</option>
                                <option value="CUCU">CUCU</option>
                                <option value="MERTUA">MERTUA</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>

                            @elseif($edPenduduk->status_keluarga == 'Tanpa Keterangan')
                                <option value="{{ $edPenduduk->status_keluarga }}" selected>
                                    {{ $edPenduduk->status_keluarga }}
                                </option>

                                <option value="KK">KK</option>
                                <option value="ISTRI">ISTRI</option>
                                <option value="ANAK">ANAK</option>
                                <option value="FAMILI LAIN">FAMILI LAIN</option>
                                <option value="CUCU">CUCU</option>
                                <option value="MERTUA">MERTUA</option>
                                <option value="ORANG TUA">ORANG TUA</option>


                            @endif


                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="statusPerkawinan">Status Perkawinan</label>
                        <select class="custom-select d-block w-100" name="statusPerkawinan">
                            <option value="" selected disabled>Pilih Status Perkawinan...</option>


                            @if ($edPenduduk->status_perkawinan == 'KAWIN')
                                <option value="{{ $edPenduduk->status_perkawinan }}" selected>
                                    {{ $edPenduduk->status_perkawinan }}
                                </option>

                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="CERAI MATI">CERAI MATI</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                <option value="KAWIN BELUM TERCATAT">KAWIN BELUM TERCATAT</option>
                                <option value="BELUM KAWIN TERCATAT">BELUM KAWIN TERCATAT</option>
                                <option value="KAWIN TERCATAT">KAWIN TERCATAT</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>

                            @elseif($edPenduduk->status_perkawinan == 'BELUM KAWIN')
                                <option value="{{ $edPenduduk->status_perkawinan }}" selected>
                                    {{ $edPenduduk->status_perkawinan }}
                                </option>
                                <option value="KAWIN">KAWIN</option>
                                <option value="CERAI MATI">CERAI MATI</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                <option value="KAWIN BELUM TERCATAT">KAWIN BELUM TERCATAT</option>
                                <option value="BELUM KAWIN TERCATAT">BELUM KAWIN TERCATAT</option>
                                <option value="KAWIN TERCATAT">KAWIN TERCATAT</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>


                            @elseif($edPenduduk->status_perkawinan == 'CERAI MATI')
                                <option value="{{ $edPenduduk->status_perkawinan }}" selected>
                                    {{ $edPenduduk->status_perkawinan }}
                                </option>
                                <option value="KAWIN">KAWIN</option>
                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                <option value="KAWIN BELUM TERCATAT">KAWIN BELUM TERCATAT</option>
                                <option value="BELUM KAWIN TERCATAT">BELUM KAWIN TERCATAT</option>
                                <option value="KAWIN TERCATAT">KAWIN TERCATAT</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>



                            @elseif($edPenduduk->status_perkawinan == 'CERAI HIDUP')
                                <option value="{{ $edPenduduk->status_perkawinan }}" selected>
                                    {{ $edPenduduk->status_perkawinan }}
                                </option>
                                <option value="KAWIN">KAWIN</option>
                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="CERAI MATI">CERAI MATI</option>
                                <option value="KAWIN BELUM TERCATAT">KAWIN BELUM TERCATAT</option>
                                <option value="BELUM KAWIN TERCATAT">BELUM KAWIN TERCATAT</option>
                                <option value="KAWIN TERCATAT">KAWIN TERCATAT</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>



                            @elseif($edPenduduk->status_perkawinan == 'KAWIN BELUM TERCATAT')
                                <option value="{{ $edPenduduk->status_perkawinan }}" selected>
                                    {{ $edPenduduk->status_perkawinan }}
                                </option>
                                <option value="KAWIN">KAWIN</option>
                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="CERAI MATI">CERAI MATI</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                <option value="BELUM KAWIN TERCATAT">BELUM KAWIN TERCATAT</option>
                                <option value="KAWIN TERCATAT">KAWIN TERCATAT</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>


                            @elseif($edPenduduk->status_perkawinan == 'BELUM KAWIN TERCATAT')
                                <option value="{{ $edPenduduk->status_perkawinan }}" selected>
                                    {{ $edPenduduk->status_perkawinan }}
                                </option>
                                <option value="KAWIN">KAWIN</option>
                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="CERAI MATI">CERAI MATI</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                <option value="KAWIN BELUM TERCATAT">KAWIN BELUM TERCATAT</option>
                                <option value="KAWIN TERCATAT">KAWIN TERCATAT</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>


                            @elseif($edPenduduk->status_perkawinan == 'KAWIN TERCATAT')
                                <option value="{{ $edPenduduk->status_perkawinan }}" selected>
                                    {{ $edPenduduk->status_perkawinan }}
                                </option>
                                <option value="KAWIN">KAWIN</option>
                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="CERAI MATI">CERAI MATI</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                <option value="KAWIN BELUM TERCATAT">KAWIN BELUM TERCATAT</option>
                                <option value="BELUM KAWIN TERCATAT">BELUM KAWIN TERCATAT</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>


                            @elseif($edPenduduk->status_perkawinan == 'Tanpa Keterangan')
                                <option value="{{ $edPenduduk->status_perkawinan }}" selected>
                                    {{ $edPenduduk->status_perkawinan }}
                                </option>
                                <option value="KAWIN">KAWIN</option>
                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="CERAI MATI">CERAI MATI</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                <option value="KAWIN BELUM TERCATAT">KAWIN BELUM TERCATAT</option>
                                <option value="BELUM KAWIN TERCATAT">BELUM KAWIN TERCATAT</option>
                                <option value="KAWIN TERCATAT">KAWIN TERCATAT</option>

                            @elseif($edPenduduk->status_perkawinan == null)
                                <option value="KAWIN">KAWIN</option>
                                <option value="BELUM KAWIN">BELUM KAWIN</option>
                                <option value="CERAI MATI">CERAI MATI</option>
                                <option value="CERAI HIDUP">CERAI HIDUP</option>
                                <option value="KAWIN BELUM TERCATAT">KAWIN BELUM TERCATAT</option>
                                <option value="BELUM KAWIN TERCATAT">BELUM KAWIN TERCATAT</option>
                                <option value="KAWIN TERCATAT">KAWIN TERCATAT</option>
                                <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                            @endif


                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>

                    {{-- <div class="col-md-4 mb-3">
                        <label for="country">Provinsi</label>
                        <select class="custom-select d-block w-100" name="province" id="province" required>
                            <option value="" selected disabled>Pilih Provinsi...</option>


                            @if ($edPenduduk->provinsi == $edPenduduk->provinsi)
                                <option value="{{ $edPenduduk->provinsi }}" selected>{{ $edPenduduk->provinsi }}
                                </option>
                            @else

                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->nama_provinsi }}">
                                        {{ $item->nama_provinsi }}
                                    </option>

                                @endforeach

                            @endif


                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="state"> Kabupaten/Kota</label>
                        <select class="custom-select d-block w-100" name="state" id="state" required>
                            <option value="" selected disabled>Pilih Kabupaten/Kota...</option>
                            @if ($edPenduduk->kota == $edPenduduk->kota)

                                <option value="{{ $edPenduduk->kota }}" selected>{{ $edPenduduk->kota }}
                                </option>

                            @else
                                @foreach ($kota as $itemKota)

                                    <option value="{{ $itemKota->nama_kota }}">{{ $itemKota->nama_kota }}</option>

                                @endforeach

                            @endif

                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div> --}}


                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input radio-inline" value="L"
                                        {{ $edPenduduk->kelamin == 'L' ? 'checked' : '' }} type="radio" name="jenkel"
                                        id="jenkel">
                                    Laki-laki</label>
                            </div>

                            <div class="form-check"><label class="form-check-label">
                                    <input class="form-check-input radio-inline" value="P"
                                        {{ $edPenduduk->kelamin == 'P' ? 'checked' : '' }} type="radio" name="jenkel"
                                        id="perempuan">
                                    Perempuan</label>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" value="Tanpa Keterangan"
                                        {{ $edPenduduk->kelamin == 'Tanpa Keterangan' ? 'checked' : '' }} name="jenkel"
                                        id="tanpaket" value="Tanpa Keterangan">
                                    Tanpa Keterangan</label>

                            </div>

                        </div>
                    </div>



                    {{-- <div class="col-md-2">
                        <div class="form-group">
                            <label for="jenisKelamin">Status Perkawinan</label>
                            <div class="form-check">
                                <label class="form-check-label">

                                    <input class="form-check-input radio-inline"
                                        {{ $edPenduduk->status_perkawinan == 'BELUM KAWIN' ? 'checked' : '' }}
                                        type="radio" name="status_perkawinan" value="BELUM KAWIN">
                                    Belum Kawin</label>
                            </div>

                            <div class="form-check"><label class="form-check-label">
                                    <input class="form-check-input radio-inline"
                                        {{ $edPenduduk->status_perkawinan == 'Kawin' ? 'checked' : '' }} type="radio"
                                        name="status_perkawinan" value="Kawin">
                                    Kawin</label>
                            </div>


                        </div>
                    </div> --}}



                    <div class="col-md-4 mb-2">
                        <div class="form-group">
                            <script>
                                var route_prefix = "/filemanager";
                            </script>
                            <h2 class="mt-4">Photo</h2>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-secondary text-white">
                                        <i class="fa fa-picture-o"></i> Pilih Gambar
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" value="{{ $edPenduduk->photo }}" type="text"
                                    name="photo">
                            </div>

                            <script>
                                {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
                            </script>
                            <script>
                                $('#lfm').filemanager('image', {
                                    prefix: route_prefix
                                });
                                // $('#lfm').filemanager('file', {prefix: route_prefix});
                            </script>
                            <script>
                                var lfm = function(id, type, options) {
                                    let button = document.getElementById(id);

                                    button.addEventListener('click', function() {
                                        var route_prefix = (options && options.prefix) ? options
                                            .prefix : '/filemanager';
                                        var target_input = document.getElementById(button
                                            .getAttribute(
                                                'data-input'));
                                        var target_preview = document.getElementById(button
                                            .getAttribute('data-preview'));

                                        window.open(route_prefix + '?type=' + options.type ||
                                            'file',
                                            'FileManager',
                                            'width=900,height=600');
                                        window.SetUrl = function(items) {
                                            var file_path = items.map(function(item) {
                                                return item.url;
                                            }).join(',');

                                            // set the value of the desired input to image url
                                            target_input.value = file_path;
                                            target_input.dispatchEvent(new Event('change'));

                                            // clear previous preview
                                            target_preview.innerHtml = '';

                                            // set or change the preview image src
                                            items.forEach(function(item) {
                                                let img = document.createElement('img')
                                                img.setAttribute('style',
                                                    'height: 5rem')
                                                img.setAttribute('src', item.thumb_url)
                                                target_preview.appendChild(img);
                                            });

                                            // trigger change event
                                            target_preview.dispatchEvent(new Event('change'));
                                        };
                                    });
                                };

                                lfm('lfm2', 'file', {
                                    prefix: route_prefix
                                });
                            </script>
                            <script>
                                $(document).ready(function() {

                                    // Nabukka filemanager na
                                    var lfm = function(options, cb) {
                                        var route_prefix = (options && options.prefix) ? options
                                            .prefix : '/filemanager';
                                        window.open(route_prefix + '?type=' + options.type ||
                                            'file',
                                            'FileManager',
                                            'width=900,height=600');
                                        window.SetUrl = cb;
                                    };




                                });
                            </script>

                        </div>
                    </div>


                </div>








                <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <button class="btn btn-success btn-lg btn-block" type="submit">Update Data</button>
                    </div>

                </div>


            </form>

        </div>

    </div>

@endsection
