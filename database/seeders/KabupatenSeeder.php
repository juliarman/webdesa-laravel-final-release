<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Http;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://ibnux.github.io/data-indonesia/kabupaten/13.json');
        $kabupaten = $response->json();

        foreach ($kabupaten as $dataKabupaten) {
            $data[] = [
                'kabupaten_id' => $dataKabupaten['id'],
                'provinsi_id' => '13',
                'nama_kabupaten' => $dataKabupaten['nama'],
            ];
        }

        Kabupaten::insert($data);
    }
}
