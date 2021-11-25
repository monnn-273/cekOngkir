<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = RajaOngkir::provinsi()->all();
        foreach ($provinces as $province)
        {
            Province::create([
                'province_id' => $province['province_id'],
                'province_name' => $province['province'],
            ]);

            $cities = RajaOngkir::kota()->dariProvinsi($province['province_id'])->get();
            foreach($cities as $city)
            {
                City::create([
                    'province_id' => $province['province_id'],
                    'city_id'=> $city['city_id'],
                    'city_name'=> $city['city_name']
                ]);
            }
        }
    }
}
