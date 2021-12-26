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
use App\Models\Slide;
use App\Models\VisiMisi;
use DateTime;
use Illuminate\Support\Carbon;

class DesaController extends Controller
{


    public function index(Request $request)
    {



        // $convert = Carbon::rawParse($date)->age;

        // foreach ($dateAge as $key) {
        //     print $key['tgl_lahir'];
        // }











        // dd($hello);






        // $dataCount = Penduduk::pluck('umur');

        // $dataCount = '03-07-1996';



        // $countPopulasi = Carbon::createFromFormat('Y-m-d', $dataCount);

        // $countPopulasi = Carbon::parse($dataCount)->age;

        // dd($dataCount);
        // dd($countPopulasi);

        // $datarow = Penduduk::pluck('umur');
        // print($datarow);

        // $countRemaja = 19;

        // if ($countRemaja >= 13 && $countRemaja <= 18) {
        //     print('Anda Remaja');
        // } else {
        //     print('Anda tidak remaja');
        // }

        $dateCountAge = Penduduk::all();


        $countPendidikan = Penduduk::pluck('pendidikan');

        $countPria = Penduduk::where('kelamin', 'L')->count();
        $countPerempuan = Penduduk::where('kelamin', 'P')->count();


        $photo = Photo::paginate(4);
        $news = Berita::where('status', 'Terbit')->paginate(4);
        $berita = Berita::where('status', 'Terbit')->orderBy('created_at', 'desc')->get();
        $berita->shift();


        $users = User::all();
        $slide = Slide::all();
        $profile = Profile::where('profile_id', 1)->get();
        // $pengaduan = Pengaduan::where('status', "Disetujui")->get();
        $headlineBerita = Berita::where('status', 'Terbit')->orderBy('created_at', 'desc')->paginate(1);
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
            'countPerempuan',
            'countPendidikan',
            'slide',
            'dateCountAge',
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

        $validasiPhoto = $pengaduan->validate([
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        // $namePhoto = $pengaduan->file('photo')->getClientOriginalName();
        $photoName = 'pengaduan' . time() . '.' . $pengaduan->photo->extension();
        $pengaduan->photo->move(public_path('storage/photos/pengaduan'), $photoName);

        $newPengaduan = new Pengaduan;
        $newPengaduan->subjek = $pengaduan->subjek;
        $newPengaduan->pesan = $pengaduan->pesan;
        $newPengaduan->nama = $pengaduan->nama;
        $newPengaduan->kontak = $pengaduan->kontak;
        $newPengaduan->photo = $photoName;
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
