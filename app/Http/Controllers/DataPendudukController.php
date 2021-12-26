<?php

namespace App\Http\Controllers;

use App\Exports\ExportData;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class DataPendudukController extends Controller
{



    public function list(Request $request)
    {

        if ($request->has('pencarian')) {
            $penduduk = Penduduk::where('nama', 'LIKE', '%' . $request->pencarian . '%')
                ->orWhere('no_nik', 'LIKE', '%' . $request->pencarian . '%')
                ->orWhere('no_kk', 'LIKE', '%' . $request->pencarian . '%')
                ->orWhere('alamat', 'LIKE', '%' . $request->pencarian . '%')
                ->orWhere('tempat_lahir', 'LIKE', '%' . $request->pencarian . '%')
                ->paginate(5);

            return view('pages.administrator.list_penduduk', compact('penduduk'));
        } else {
            $penduduk = Penduduk::orderBy('created_at', 'desc')->paginate(5);
            return view('pages.administrator.list_penduduk', compact('penduduk'));
        }
        // return view('pages.administrator.list_penduduk');
    }

    public function data(Request $request)
    {

        if ($request->has('pencarian')) {
            $penduduk = Penduduk::where('nama', 'LIKE', '%' . $request->pencarian . '%')
                ->orWhere('no_nik', 'LIKE', '%' . $request->pencarian . '%')
                ->orWhere('no_kk', 'LIKE', '%' . $request->pencarian . '%')
                ->orWhere('alamat', 'LIKE', '%' . $request->pencarian . '%')
                ->orWhere('tempat_lahir', 'LIKE', '%' . $request->pencarian . '%')
                ->paginate(5);

            return view('pages.penduduk', compact('penduduk'));
        } else {
            $penduduk = Penduduk::orderBy('created_at', 'desc')->paginate(5);
            return view('pages.penduduk', compact('penduduk'));
        }
    }

    public function add()
    {

        $provinsi = Provinsi::all();
        $kota = Kota::all();
        return view('pages.administrator.add_penduduk', compact('provinsi', 'kota'));
    }


    public  function detailpenduduk(Penduduk $id)
    {
        $dataPenduduk = Penduduk::find($id);
        $dataPenduduk = $id->tgl_lahir;
        $agePenduduk = Carbon::parse($dataPenduduk)->age;
        return view('pages.detailpenduduk', compact('id', 'agePenduduk'));
    }


    public function store(Request $penduduk)
    {
        $newPenduduk = new Penduduk;
        $newPenduduk->nama = $penduduk->nama;
        $newPenduduk->no_nik = $penduduk->nik;
        $newPenduduk->no_kk = $penduduk->nkk;
        $newPenduduk->no_hp = $penduduk->nohp;
        $newPenduduk->kelamin = $penduduk->jenkel;
        // $newPenduduk->dusun = $penduduk->dusun;
        $newPenduduk->tempat_lahir = $penduduk->tempat_lahir;
        $newPenduduk->keterangan = $penduduk->keterangan;
        $newPenduduk->status_perkawinan = $penduduk->statusPerkawinan;
        $newPenduduk->pendidikan = $penduduk->pendidikan_terakhir;
        $newPenduduk->agama = $penduduk->agama;
        $newPenduduk->tgl_lahir = $penduduk->tanggal;
        $newPenduduk->status = $penduduk->status;
        $newPenduduk->photo = $penduduk->photo;
        $newPenduduk->pekerjaan = $penduduk->pekerjaan;
        $newPenduduk->status_keluarga = $penduduk->statusKeluarga;
        // $newPenduduk->provinsi = $penduduk->province;
        // $newPenduduk->kota = $penduduk->state;
        $newPenduduk->alamat = $penduduk->alamat;
        $newPenduduk->save();

        return redirect('list-penduduk')->with('message', 'DATA PENDUDUK BERHASIL DITAMBAHKAN!');
        // dd($newPenduduk);
    }


    public function delete(Penduduk $penduduk)
    {
        Penduduk::destroy($penduduk->penduduk_id);
        return redirect('list-penduduk')->with('status', 'DATA BERHASIL DIHAPUS!');
    }


    public function update(Request $request, $penduduk)
    {

        $updatePenduduk = Penduduk::find($penduduk);
        $updatePenduduk->update([

            'nama' => $request->nama,
            'no_nik' => $request->nik,
            'no_kk' => $request->nkk,
            'no_hp' => $request->nohp,
            'kelamin' => $request->jenkel,
            'agama' => $request->agama,
            'tgl_lahir' => $request->tanggal,
            'photo' => $request->photo,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            // 'dusun' => $request->dusun,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'status_perkawinan' => $request->statusPerkawinan,
            'tempat_lahir' => $request->tempatLahir,
            // 'kota' => $request->state,
            // 'provinsi' => $request->provinsi,
            'pendidikan' => $request->pendidikan_terakhir,

        ]);


        return redirect('list-penduduk')->with('message', 'DATA BERHASIL DI UPDATE!');
    }


    public function edit($penduduk)
    {
        // $provinsi = Provinsi::all();
        // $kota = Kota::all();
        $edPenduduk = Penduduk::find($penduduk);
        return view('pages.administrator.edit_penduduk', compact('edPenduduk'));
    }

    public function exportDataPenduduk()
    {
        $export = new ExportData();
        return Excel::download($export, 'data_penduduk.xlsx');
    }
}
