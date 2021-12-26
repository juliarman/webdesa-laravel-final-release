<?php

namespace App\Http\Controllers;

use App\Models\Bumdes;
use Illuminate\Http\Request;

class BumdesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bumdes = Bumdes::orderBy('created_at', 'desc')->paginate(3);
        return view('pages.bumdes', compact('bumdes'));
    }


    public function addBumdes()
    {

        return view('vendor.laravel-filemanager.tulis_bumdes');
    }


    public function store(Request $request)
    {

        $newBumdes = new Bumdes;
        $id = auth()->user()->users_id;
        $newBumdes->users_id = $id;
        $newBumdes->judul = $request->judul;
        $newBumdes->sub_judul = $request->subjudul;
        $newBumdes->status = $request->status;
        $newBumdes->slug = str_slug($request->judul);
        $newBumdes->isi_konten = $request->content;
        $newBumdes->gambar = $request->gambar;

        $newBumdes->save();
        return redirect('bumdes-admin')->with('message', 'DATA BUMDES BERHASIL DI TAMBAHKAN');
    }


    public function show(Bumdes $bumdes)
    {

        $listBumdes = Bumdes::orderBy('created_at', 'desc')->paginate(4);
        return view('pages.administrator.listbumdes', compact('listBumdes'));
    }

    public function detail(Bumdes $id)
    {
        return view('pages.detail_bumdes', compact('id'));
    }

    public function edit(Bumdes $bumdes)
    {
        $dataBumdes = Bumdes::find($bumdes->bumdes_id);

        return view('vendor.laravel-filemanager.edit_bumdes', compact('dataBumdes'));
    }


    public function update(Request $request, Bumdes $bumdes)
    {

        $updateBumdes = Bumdes::find($bumdes->bumdes_id);
        $updateBumdes->update([

            'judul' => $request->judul,
            'sub_judul' => $request->subjudul,
            'status' => $request->status,
            'gambar' => $request->gambar,
            'isi_konten' => $request->content,


        ]);


        return redirect('bumdes-admin')->with('message', 'DATA BERHASIL DI UPDATE');
    }


    public function destroy(Bumdes $bumdes)
    {

        Bumdes::destroy($bumdes->bumdes_id);
        return redirect('bumdes-admin')->with('pesan', 'DATA BUMDES BERHASIL DI HAPUS');
    }
}
