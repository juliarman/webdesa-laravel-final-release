<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use App\Models\Jbansos;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class BansosController extends Controller
{


    public function index(Request $request)
    {


        $dataProvinsi = Provinsi::all();
        $dataKota = Kota::all();


        if ($request->has('search')) {


            $validate = $request->validate([
                'search' => 'required|digits:16|numeric'
            ]);

            $kategoriBansos = Jbansos::all();
            $listBansos = Bansos::orderBy('status', 'desc')
                ->orderBy('created_at', 'desc')
                ->where('no_ktp', 'LIKE', '%' . $request->search . '%')
                ->get();

            return view('pages.administrator.bansos', compact('listBansos', 'kategoriBansos', 'dataProvinsi', 'dataKota'));
        } else {
            $kategoriBansos = Jbansos::all();
            $listBansos = Bansos::orderBy('status', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

            return view('pages.administrator.bansos', compact('listBansos', 'kategoriBansos', 'dataProvinsi', 'dataKota'));
        }
    }


    public function bansos(Request $request)
    {






        if ($request->has('checking')) {
            $validasi = $request->validate([

                'checking' => 'required|digits:16|numeric'

            ]);
            $queryCek = $request->checking;
            $dataBansos = Bansos::where('no_ktp', 'like', '%' . $queryCek . '%')->paginate(1);

            return view('pages.bansos', compact('dataBansos'));
        } else {
            return view('pages.bansos');
        }




        // $dataChecking = $request->checking;
        // $dataBansos = Bansos::where('no_ktp', 'like', '%' . $dataChecking . '%')->paginate(1);
        // return view('pages.bansos', compact('dataBansos', 'dataChecking'));


        // if ($request->has('checking')) {
        //     $$dataBansos = Bansos::orderBy('status', 'desc')
        //         ->orderBy('created_at', 'desc')
        //         ->where('no_ktp', 'LIKE', '%' . $request->checking . '%')
        //         ->get();
        //     return view('pages.bansos', compact('dataBansos'));
        // } else {
        //     $dataBansos = Bansos::orderBy('status', 'desc')
        //         ->orderBy('created_at', 'desc')
        //         ->paginate(1);
        //     return view('pages.bansos', compact('dataBansos'));
        // }
    }

    public function deletePenerima(Bansos $bansos)
    {

        Bansos::destroy($bansos->bansos_id);
        return redirect('bansos-admin')->with('status', 'Data Bansos Berhasil Di Hapus');
    }

    public function deleteJbansos(Jbansos $id)
    {

        Jbansos::destroy($id->jbansos_id);
        return redirect('bansos-admin')->with('status', 'Kategori Bansos Berhasil Di Hapus');
    }


    public function store(Request $request)
    {


        $addBansos = new Bansos;
        $addBansos->nama = $request->nama;
        $addBansos->nama_kabupaten = $request->kota;
        $addBansos->no_kk = $request->kk;
        $addBansos->no_ktp = $request->ktp;
        $addBansos->no_rekening = $request->norekening;
        $addBansos->alamat = $request->alamat;
        $addBansos->nama_provinsi = $request->provinsi;
        $addBansos->nama_kecamatan = $request->kecamatan;
        $addBansos->nama_kelurahan = $request->kelurahan;
        $addBansos->no_hp = $request->nohp;
        $addBansos->no_rt = $request->nort;
        $addBansos->no_rw = $request->norw;
        $addBansos->cif = $request->cif;
        $addBansos->reg = $request->reg;
        $addBansos->no_kartu = $request->nokartux;
        $addBansos->nama_area = $request->namaarea;
        $addBansos->kocab = $request->kocab;
        $addBansos->keterangan = $request->keterangan;
        $addBansos->jenis_bantuan = $request->jenis_bantuan;
        $addBansos->status = $request->status;



        $addBansos->save();

        return redirect('bansos-admin')->with('message', 'Berhasil Di Simpan');
    }


    public function edit(Request $request, $id)
    {

        $editBansos = Bansos::find($id);
        $editBansos->update([
            'nama' => $request->nama,
            'no_ktp' => $request->ktp,
            'no_kk' => $request->kk,
            'nama_provinsi' => $request->provinsi,
            'nama_kabupaten' => $request->kota,
            'nama_kecamatan' => $request->kecamatan,
            'nama_kelurahan' => $request->kelurahan,
            'no_rt' => $request->nort,
            'no_rw' => $request->norw,
            'cif' => $request->cif,
            'no_rekening' => $request->norekening,
            'no_kartu' => $request->nokartux,
            'kocab' => $request->kocab,
            'nama_area' => $request->namaarea,
            'reg' => $request->reg,
            'no_hp' => $request->nohp,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'jenis_bantuan' => $request->jenis_bantuan,
            'status' => $request->status,

        ]);


        return redirect('bansos-admin')->with('message', 'Data Berhasi Diperbarui!');
    }




    public function addKategori(Request $request)
    {
        $newKategoriBansos = new Jbansos;
        $newKategoriBansos->kategori_bansos = $request->kategori;
        $newKategoriBansos->save();
        return redirect('bansos-admin')->with('message', 'Kategori Bansos Berhasil Di Simpan');
    }
}
