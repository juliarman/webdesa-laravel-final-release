<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\User;
use App\Berita;
use App\Categories;
use App\Models\Provinsi;

use function GuzzleHttp\Psr7\str;

class BeritaController extends Controller
{
    public function index()
    {
        $users = User::all();
        $berita = Berita::where('status', 'Terbit')->orderBy('created_at', 'desc')->paginate(6);
        $headlinePost = Berita::where('status', 'Terbit')->orderBy('created_at', 'desc')->paginate(1);


        return view('pages.berita.berita', compact('users', 'berita', 'headlinePost'));
    }



    public function show(Berita $berita, Agenda $agenda)
    {
        return view('pages.berita.detail', compact('berita', 'agenda'));
    }




    public function write()
    {
        $categories = Categories::all();
        $provinsi = Provinsi::all();
        return View('vendor.laravel-filemanager.tulis-berita', compact('categories', 'provinsi'));
    }


    public function store(Request $request)
    {

        $id = auth()->user()->users_id;
        $berita = new Berita;
        $berita->users_id = $id;
        $berita->categories_id = $request->categories_id;
        $berita->judul = $request->judul;
        $berita->status = $request->status;
        $berita->slug = str_slug($request->judul);
        $berita->sub_judul = $request->subjudul;
        $berita->gambar = $request->gambar;
        $berita->isi_konten = $request->content;


        // dd($berita);
        $berita->save();
        return redirect('list-berita')->with('message', 'BERHASIL MENAMBAHKAN BERITA');
    }

    public function upload(Request $request)
    {

        if ($request->hasFile('upload')) {

            $file = $request->file('upload');
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/upload'), $fileName);
            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('assets/upload' . $fileName);
            $msg = 'Gambar Berhasil Di Upload';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            return $response;
        }
    }





    public function hapus(Berita $idBerita)
    {
        Berita::destroy($idBerita->berita_id);
        return redirect('list-berita')->with('status', 'BERITA BERHASIL DIHAPUS');
    }

    public function listBerita()
    {
        $categories = Categories::all();
        $listBerita = Berita::orderBy('created_at', 'desc')->paginate(4);
        return view('pages.administrator.listberita', compact('listBerita', 'categories'));
    }


    public function addKategori(Request $kategori)
    {
        $newKategori = new Categories;
        $newKategori->name = $kategori->nama_kategori;
        $newKategori->slug = str_slug($kategori->nama_kategori);
        $newKategori->description = $kategori->deskripsi;
        $newKategori->save();
        return redirect('list-berita')->with('message', 'KATEGORI BERHASIL DIBUAT');
    }

    public function editBerita($idBerita, $idCategories)
    {
        $berita = Berita::find($idBerita);
        $categories = Categories::find($idCategories);
        return view('vendor.laravel-filemanager.edit-berita', compact('berita', 'categories'));
    }

    public function updateBerita(Request $request, $idBerita)
    {

        $berita = Berita::find($idBerita);
        $berita->update([

            'judul' => $request->judul,
            'sub_judul' => $request->subjudul,
            'status' => $request->status,
            'gambar' => $request->gambar,
            'isi_konten' => $request->content,

        ]);

        // dd($berita);

        return redirect('/list-berita')->with('message', 'BERITA BERHASIL DI UPDATE');
    }

    public function deleteCategories(Categories $id)
    {
        Categories::destroy($id->categories_id);
        return redirect('list-berita')->with('message', 'KATEGORI BERHASIL DI HAPUS');
    }


    public function showArtikelCategories(Categories $categories)
    {

        $article = $categories->artikel()->get();

        return view('pages.list_article_category', compact('article'));
    }
}
