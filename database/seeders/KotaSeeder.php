<?php

namespace Database\Seeders;

use App\Models\Kota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $header = 'a394b597e7c09011ea48eb6edc6b0b44';
        $response = Http::withHeaders([

            'key' => $header

        ])->get('https://api.rajaongkir.com/starter/city');

        $kota = $response['rajaongkir']['results'];

        foreach ($kota as $dataKota) {
            $data[] = [
                'kota_id' => $dataKota['city_id'],
                'provinsi_id' => $dataKota['province_id'],
                'nama_provinsi' => $dataKota['province'],
                'type' => $dataKota['type'],
                'nama_kota' => $dataKota['city_name'],
                'kode_pos' => $dataKota['postal_code'],
            ];
        }

        Kota::insert($data);
    }
}
