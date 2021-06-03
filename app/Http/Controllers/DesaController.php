<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;
use App\Models\Aparatur;
use App\User;
use App\Berita;
use App\Models\Album;
use App\Models\Penduduk;
use App\Models\Pengaduan;
use App\Models\Photo;
use App\Models\Profile;
use App\Models\VisiMisi;

class DesaController extends Controller
{


    public function index(Request $request)
    {



        $countPria = Penduduk::where('kelamin', 'Laki-laki')->count();
        $countPerempuan = Penduduk::where('kelamin', 'Perempuan')->count();


        $photo = Photo::paginate(4);
        $news = Berita::where('status', 'Terbit')->paginate(4);
        $berita = Berita::where('status', 'Terbit')->paginate(4);
        $users = User::all();
        $profile = Profile::where('profile_id', 1)->get();
        // $pengaduan = Pengaduan::where('status', "Disetujui")->get();
        $headlineBerita = Berita::where('status', 'Terbit')->paginate(1);
        $aparatur = Aparatur::paginate(5);
        $agenda = Agenda::paginate(4);
        return view('pages.index', compact(
            'aparatur',
            'berita',
            'users',
            'headlineBerita',
            'request',
            'news',
            'agenda',
            'photo',
            'profile',
            'countPria',
            'countPerempuan'
        ));
    }

    public function visi()
    {
        $visiMisi = VisiMisi::find(1);
        return view('pages.visimisi', compact('visiMisi'));
    }

    public function album()
    {

        return view('pages.album');
    }

    public function pengaduan()
    {
        return view('pages.pengaduan');
    }


    public function kirimPengaduan(Request $pengaduan)
    {
        $newPengaduan = new Pengaduan;
        $newPengaduan->subjek = $pengaduan->subjek;
        $newPengaduan->pesan = $pengaduan->pesan;
        $newPengaduan->nama = $pengaduan->nama;
        $newPengaduan->kontak = $pengaduan->kontak;
        $newPengaduan->status = 'Belum Disetujui';
        $newPengaduan->save();


        return view('pages.result_pengaduan');
    }

    public function aparatur()
    {
        $kepdes = Aparatur::where('jabatan', 'Kepala Desa')->get();
        $aparatur = Aparatur::all();
        $filter = $aparatur->whereNotIn('jabatan', 'Kepala Desa');
        $filter->all();
        // dd($filter);
        return view('pages.aparatur_desa', compact('kepdes', 'filter'));
    }


    public function profile()
    {
        $profile = Profile::all();
        return view('pages.profile', compact('profile'));
    }
}
