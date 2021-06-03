<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Provinsi;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $response = Http::get('https://ibnux.github.io/data-indonesia/propinsi.json');
        // $provinsi = $response->json();
        // foreach ($provinsi as $dataProvinsi) {
        //     $data[] = [
        //         'provinsi_id' => $dataProvinsi['id'],
        //         'nama_provinsi' => $dataProvinsi['nama'],
        //     ];
        // }
        // Provinsi::insert($data);

        $header = 'a394b597e7c09011ea48eb6edc6b0b44';
        $response = Http::withHeaders([
            'key' => $header
        ])->get('https://api.rajaongkir.com/starter/province');
        $provinsi = $response['rajaongkir']['results'];
        foreach ($provinsi as $dataProvinsi) {
            $data[] = [
                'provinsi_id' => $dataProvinsi['province_id'],
                'nama_provinsi' => $dataProvinsi['province'],
            ];
        }
        Provinsi::insert($data);
    }
}
