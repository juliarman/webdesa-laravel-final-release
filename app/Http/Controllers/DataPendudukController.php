<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Penduduk;
use Illuminate\Http\Request;

use Illuminate\View\View;

class DataPendudukController extends Controller
{



    public function list(Request $request)
    {

        if ($request->has('pencarian')) {
            $penduduk = Penduduk::where('nama', 'LIKE', '%' . $request->pencarian . '%')->get();
            return view('pages.administrator.list_penduduk', compact('penduduk'));
        } else {
            $penduduk = Penduduk::orderBy('created_at', 'desc')->take(1)->paginate(5);
            return view('pages.administrator.list_penduduk', compact('penduduk'));
        }
        // return view('pages.administrator.list_penduduk');
    }

    public function data(Request $request)
    {

        if ($request->has('pencarian')) {
            $penduduk = Penduduk::where('nama', 'LIKE', '%' . $request->pencarian . '%')->get();
            return view('pages.penduduk', compact('penduduk'));
        } else {
            $penduduk = Penduduk::orderBy('created_at', 'desc')->take(3)->paginate(5);
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
        return view('pages.detailpenduduk', compact('id'));
    }


    public function store(Request $penduduk)
    {
        $newPenduduk = new Penduduk;
        $newPenduduk->nama = $penduduk->nama;
        $newPenduduk->no_nik = $penduduk->nik;
        $newPenduduk->no_kk = $penduduk->nkk;
        $newPenduduk->no_hp = $penduduk->nohp;
        $newPenduduk->kelamin = $penduduk->jenkel;
        $newPenduduk->agama = $penduduk->agama;
        $newPenduduk->tgl_lahir = $penduduk->tanggal;
        $newPenduduk->photo = $penduduk->photo;
        $newPenduduk->pekerjaan = $penduduk->pekerjaan;
        $newPenduduk->tempat_lahir = $penduduk->province . ' - ' . $penduduk->state . ',';
        $newPenduduk->alamat = $penduduk->alamat;
        $newPenduduk->save();

        return redirect('list-penduduk')->with('message', 'DATA PENDUDUK BERHASIL DITAMBAHKAN!');
        // dd($newPenduduk);
    }


    public function delete(Penduduk $penduduk)
    {
        Penduduk::destroy($penduduk->penduduk_id);
        return redirect('list-penduduk')->with('message', 'DATA BERHASIL DIHAPUS!');
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
            'tempat_lahir' => $request->province . ' - ' . $request->state . ',',
            'alamat' => $request->alamat,

        ]);


        return redirect('list-penduduk')->with('message', 'DATA BERHASIL DI UPDATE!');
    }


    public function edit($penduduk)
    {
        $provinsi = Provinsi::all();
        $kota = Kota::all();
        $edPenduduk = Penduduk::find($penduduk);
        return view('pages.administrator.edit_penduduk', compact('edPenduduk', 'provinsi', 'kota'));
    }
}
