<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Agenda;




class AgendaController extends Controller
{



    public function index(Request $request)
    {

        $users = User::all();
        $agenda = Agenda::orderBy('created_at', 'desc')->take(4)->paginate(4);

        return view('pages.agenda', compact('agenda', 'users', 'request'));
    }


    public function create(Request $request)
    {

        $newAgenda = new Agenda;

        $newAgenda->judul = $request->judul;
        $newAgenda->tempat = $request->tempat;
        $newAgenda->waktu = $request->waktu;
        $newAgenda->tanggal = $request->tanggal;
        $newAgenda->keterangan = $request->keterangan;
        $newAgenda->save();

        return redirect('/agenda-admin')->with('message', 'AGENDA BERHASIL DI BUAT');
    }


    public function store(Request $request)
    {
    }

    public function show()
    {

        $users = User::all();
        $listAgenda = Agenda::orderBy('created_at', 'desc')->take(3)->paginate(3);


        return view('pages.administrator.list_agenda', compact('listAgenda'));
    }


    public function add()
    {
        return view('pages.administrator.add_agenda');
    }

    public function edit($id)
    {
        $agenda = Agenda::find($id);
        return view('pages.administrator.edit_agenda', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        $agenda->update([

            'judul' => $request->judul,
            'tempat' => $request->tempat,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);


        return redirect('agenda-admin')->with('message', 'DATA BERHASIL DIPERBARUI');
    }


    public function hapus(Agenda $id)
    {
        Agenda::destroy($id->agenda_id);
        return redirect('agenda-admin')->with('message', 'DATA BERHASIL DIHAPUS');
    }
}
