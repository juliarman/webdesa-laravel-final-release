<?php

namespace App\Http\Controllers;

use App\Models\JSurat;
use App\Models\Profile;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{


    public function surat()
    {
        $jsurat = JSurat::all();
        $profile = Profile::where('profile_id', 1)->get();
        // dd($profile);
        return view('pages.surat', compact('jsurat', 'profile'));
    }

    public function kirimPermintaan(Request $surat)
    {

        $validasiPhoto = $surat->validate([
            'photo1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'photo2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        // $namePhoto = $pengaduan->file('photo')->getClientOriginalName();
        $photoBerkas1 = 'photoberkas_1_' . time() . '.' . $surat->photo1->extension();
        $surat->photo1->move(public_path('storage/photos/surat'), $photoBerkas1);

        $photoBerkas2 = 'photoberkas_2_' . time() . '.' . $surat->photo2->extension();
        $surat->photo2->move(public_path('storage/photos/surat'), $photoBerkas2);

        $newSurat = new Surat;
        $newSurat->nama = $surat->name;
        $newSurat->nik = $surat->nik;
        $newSurat->no_hp = $surat->telp;
        $newSurat->pekerjaan = $surat->pekerjaan;
        $newSurat->umur = $surat->umur;
        $newSurat->ttl = $surat->ttl;
        $newSurat->photo_berkas_pendukung_1 = $photoBerkas1;
        $newSurat->photo_berkas_pendukung2 = $photoBerkas2;
        $newSurat->alamat_lengkap = $surat->alamat;
        $newSurat->status = 'Belum Diproses';
        $newSurat->jenis_surat = $surat->jenis_surat;
        $newSurat->kelamin = $surat->jenkel;
        $newSurat->agama = $surat->agama;
        $newSurat->pesan = $surat->pesan;



        $newSurat->save();
        return view('pages.result_surat', compact('newSurat'));
    }


    public function listsurat()
    {
        $jsurat = JSurat::all();
        $surat = Surat::orderBy('status', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(5)->paginate(5);
        return view('pages.administrator.list_surat', compact('surat', 'jsurat'));
    }

    public function confirm($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'status' => 'Telah Diproses',
        ]);
        return redirect('surat-admin')->with('confirmation', 'PERMINTAAN SURAT BERHASIL DISELESAIKAN!');
    }

    public function delete(Surat $id)
    {
        Surat::destroy($id->surat_id);
        $photoPath01 = 'storage/photos/surat/' . $id->photo_berkas_pendukung_1;
        $photoPath02 = 'storage/photos/surat/' . $id->photo_berkas_pendukung2;

        if (file_exists($photoPath01)) {

            @unlink($photoPath01);
        }

        if (file_exists($photoPath02)) {

            @unlink($photoPath02);
        }
        return redirect('/surat-admin')->with('status', 'Data Surat Berhasil Dihapus');
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
        return redirect('/surat-admin')->with('message', 'Jenis Surat Berhasil Ditambahkan');
    }


    public function hapus(Jsurat $id)
    {
        Jsurat::destroy($id->jsurat_id);
        return redirect('surat-admin')->with('status', 'Jenis Surat Berhasil Dihapus');
    }
}
