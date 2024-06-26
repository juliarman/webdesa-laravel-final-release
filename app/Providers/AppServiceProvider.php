<?php

namespace App\Providers;

use App\Agenda;
use App\Berita;
use App\Categories;
use App\Models\Aparatur;
use App\Models\NoPenting;
use App\Models\Pengaduan;
use App\Models\Profile;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $dataBerita = Berita::where('status', 'Terbit')->orderBy('created_at', 'desc')->take(4)->get();
        $dataAgendaDesa = Agenda::where('agenda_id', 2)->get();
        $dataProfileDesa = Profile::where('profile_id', 1)->get();
        $dataCategories = Categories::all();
        $dataNoPenting = NoPenting::all();
        $dataPengaduan = Pengaduan::where('status', "Disetujui")->get();
        view()->share(['data' => $dataPengaduan, 'nopenting' => $dataNoPenting, 'profile' => $dataProfileDesa, 'agenda' => $dataAgendaDesa, 'beritanya' => $dataBerita, 'categories' => $dataCategories]);
    }
}
