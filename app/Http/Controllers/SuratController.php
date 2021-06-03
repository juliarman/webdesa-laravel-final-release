<?php

namespace App\Http\Controllers;

use App\Models\JSurat;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{


    public function surat()
    {
        $jsurat = JSurat::all();
        return view('pages.surat', compact('jsurat'));
    }

    public function kirimPermintaan(Request $surat)
    {
        $newSurat = new Surat;
        $newSurat->nama = $surat->name;
        $newSurat->nik = $surat->nik;
        $newSurat->no_hp = $surat->telp;
        $newSurat->jenis_surat = $surat->jenis_surat;
        $newSurat->pesan = $surat->pesan;
        $newSurat->save();
        return view('pages.result_surat', compact('newSurat'));
    }

    public function listsurat()
    {
        $jsurat = JSurat::all();
        $surat = Surat::paginate(5);
        return view('pages.administrator.list_surat', compact('surat', 'jsurat'));
    }


    public function delete(Surat $id)
    {
        Surat::destroy($id->surat_id);
        return redirect('/surat-admin')->with('message', 'Data Berhasil Dihapus');
    }

    public function detail(Surat $id)
    {

        return view('pages.administrator.detail_surat', compact('id'));
    }

    public function jsurat(Request $jsurat)
    {
        $newJsurat = new JSurat;
        $newJsurat->jenis_surat = $jsurat->jenis_surat;
        $newJsurat->save();
        return redirect('/surat-admin')->with('status', 'Jenis Surat Berhasil Ditambahkan');
    }


    public function hapus(Jsurat $id)
    {
        Jsurat::destroy($id->jsurat_id);
        return redirect('surat-admin')->with('message', 'Data Berhasil Dihapus');
    }
}
