<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\User;
use App\Categories;
use App\Models\Aparatur;
use App\Models\NoPenting;
use App\Models\Pengaduan;
use App\Models\Profile;
use App\Models\Provinsi;
use App\Models\VisiMisi;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Echo_;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profiledesa()
    {

        $profileDesa =  Profile::where('profile_id', 1)->get();
        // dd($profileDesa);
        return view('pages.administrator.profildesa', compact('profileDesa'));
    }




    public function updateProfileDesa(Request $request, $id)
    {
        $profil =  Profile::find($id);

        // dd($profil);

        $profil->update([
            'nama_desa' => $request->namadesa,
            'email' => $request->email,
            'kepala_desa' => $request->kepaladesa,
            'no_telpon' => $request->notelpon,
            'url' => $request->urlwebsite,
            'alamat' => $request->alamat,
            'photo_kepdes' => $request->photo,
            'map' => $request->map,
            'deskripsi' => $request->deskripsi,
            'logo' => $request->logo,
            'keyword' => $request->keyword,
            'isi_konten' => $request->content,
            'visimisi' => "Visimisi",
            'favicon' => "favicon",
        ]);

        // dd($profil);

        return redirect('profil-desa')->with('message', 'INFORMASI DESA BERHASIL DIPERBARUI');
    }



    public function detailPengaduan($id)
    {

        // dd($id->pesan);
        $pengaduan = Pengaduan::find($id);

        return view('pages.administrator.detail_pengaduan', compact('pengaduan'));
    }

    public function approve(Request $request, $id)
    {

        $pengaduan = Pengaduan::find($id);
        $pengaduan->update([
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
            'nama' => $request->nama,
            'kontak' => $request->kontak,
            'status' => "Disetujui",
        ]);

        // dd($pengaduan);



        return redirect('/pengaduan-admin')->with('message', 'PENGADUAN BERHASIL DISETUJUI!');
    }


    public function deletePengaduan(Pengaduan $id)
    {
        Pengaduan::destroy($id->pengaduan_id);
        return redirect('pengaduan-admin');
    }

    public function pengaduan()
    {

        $pengaduan = Pengaduan::paginate(5);
        return view('pages.administrator.pengaduan', compact('pengaduan'));
    }



    public function edit($id)
    {
        $aparatur = Aparatur::find($id);
        return view('pages.administrator.edit_aparatur', compact('aparatur'));
    }

    public function update(Request $request, $id)
    {
        $aparatur = Aparatur::find($id);
        $aparatur->update([

            'nama' => $request->nama,
            'jabatan' => $request->posisi,
            'no_hp' => $request->nomor,
            'photo' => $request->gambar,

        ]);
        return redirect('/aparatur-desa')->with('pesan', 'Data Berhasil Diubah');
    }

    public function hapus(Aparatur $aparatur)
    {
        Aparatur::destroy($aparatur->aparatur_id);
        return redirect('/aparatur-desa')->with('status', 'Data Berhasil Di Hapus!');
    }



    public function aparatur()
    {


        $aparatur = Aparatur::paginate(9);

        return view('pages.administrator.aparatur', compact('aparatur'));
    }


    public function aparaturstore(Request $aparatur)
    {

        $dataAparatur = new Aparatur;
        $dataAparatur->nama = $aparatur->nama;
        $dataAparatur->jabatan = $aparatur->posisi;
        $dataAparatur->no_hp = $aparatur->nomor;
        $dataAparatur->photo = $aparatur->gambar;
        $dataAparatur->save();
        $aparatur->session()->flash('pesan', 'Data Berhasil Di Simpan!');
        return redirect('/aparatur-desa');
    }




    public function nomorpenting()
    {

        $noPenting = NoPenting::paginate(4);
        // dd($noPenting);
        return view('pages.administrator.nomor_penting', compact('noPenting'));
    }


    public function deleteNoPenting(NoPenting $id)
    {

        NoPenting::destroy($id->nopenting_id);
        return redirect('nomor-penting')->with('message', 'NOMOR BERHASIL DI HAPUS');
    }

    public function storeNoPenting(Request $request)
    {

        $newNoPenting = new NoPenting;
        $newNoPenting->nama =  $request->namainstansi;
        $newNoPenting->nomor = $request->nomorpenting;
        $newNoPenting->save();

        return redirect('nomor-penting')->with('message', 'NOMOR BERHASIL DI TAMBAHKAN!');

        // dd($newNoPenting);
    }




    public function visimisi()
    {
        $visiMisi = VisiMisi::find(1);
        // dd($visiMisi);
        return view('pages.administrator.visimisi', compact('visiMisi'));
    }


    public function updatevisi(Request $request)
    {

        $visiMisi = VisiMisi::find(1);
        $visiMisi->update([
            'judul' => $request->judul,
            'content' => $request->content,
        ]);

        return redirect('visimisi-admin')->with('message', 'DATA INFORMASI BERHASIL DIUBAH');
    }





    public function form()
    {
        return View('vendor.laravel-filemanager.demo');
    }


    public function test()
    {
        return view('pages.administrator.test');
    }
}
