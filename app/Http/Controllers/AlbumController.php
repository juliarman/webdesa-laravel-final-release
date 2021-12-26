<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {

        $album = Album::all();
        $photo = Photo::paginate(4);

        return view('pages.album', compact('album', 'photo'));
    }


    public function detail(Photo $detail)
    {
        return view('pages.detailalbum', compact('detail'));
    }


    public function albumAdmin()
    {
        $album = Album::all();
        $photo = Photo::all();
        return view('pages.administrator.album', compact('photo', 'album'));
    }

    public function tambahAlbum(Request $albumRequest)
    {
        $album = new Album;
        $album->nama_album = $albumRequest->namaAlbum;
        $album->deskripsi = $albumRequest->deskripsiAlbum;
        // dd($album);
        $album->save();
        return redirect('album-admin')->with('message', 'ALBUM BERHASIL DI BUAT');
    }

    public function delete(Album $id)
    {
        Album::destroy($id->album_id);
        return redirect('album-admin')->with('status', 'ALBUM BERHASIL DI HAPUS');
    }

    public function deletePhoto(Photo $id)
    {
        Photo::destroy($id->photo_id);
        return redirect('album-admin')->with('status', 'Photo Berhasil Di Hapus');
    }

    public function savePhoto(Request $photoRequest)
    {
        $photo = new Photo;
        $photo->album_id = $photoRequest->get('album');
        $photo->image = $photoRequest->gambar;
        // dd($photo);
        $photo->save();
        return redirect('album-admin')->with('message', 'Photo berhasil Di Simpan!');
    }
}
