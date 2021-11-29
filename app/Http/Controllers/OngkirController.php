<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use App\Models\Courier;
use App\Models\Order;
use Kavist\RajaOngkir\Facades\RajaOngkir;


class OngkirController extends Controller
{
    // // public function index()
    // // {
    // //     $provinces = Province::all();
    // //     $cities = City::all();
    // //     $couriers = Courier::all();

    // //     dd($provinces, $cities, $couriers); 
    // // }

    // public $dariIdProvince = 0;
    // public $dariIdCity = 0;
    // public $keIdProvince = 0;
    // public $keIdCity = 0;
    // public $kurir = 0;
    // public $berat = 0;
    // public $harga;

    // public function render()
    // {
       
    //     $keProvinces = Province::pluck('province_name', 'province_id');
    //     $keCities = City::where('province_id', $this->keIdProvince)->pluck('city_name', 'city_id');

    //     // dd ($dariProvinces, $dariCities);
    //     return view('cekOngkir', compact( 'keProvinces', 'keCities'));
    // }

    // public function checkOngkir()
    // {
    //     $cost = FacadesRajaOngkir::ongkosKirim([
    //         'origin'        => $this->dariIdCity, // ID kota/kabupaten asal
    //         'destination'   => $this->keIdCity, // ID kota/kabupaten tujuan
    //         'weight'        => $this->berat, // berat barang dalam gram
    //         'courier'       => $this->kurir // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
    //     ])->get();


    //     $this->harga = $cost;
    // }

    // public function yes(Request $request)
    // {
    //     $province_id = $request->dariIdProvince;
    //     $dariCities = City::where('province_id', $this->dariIdProvince)->pluck('city_name', 'city_id');

    //     return back()->compact('dariCities')->with('status', 'ada');

    // }

    public function index()
    {
        $couriers = Courier::pluck('expedition_name','code');
        $provinces = Province::pluck('province_name','province_id');
        return view('cekOngkir', compact('couriers','provinces'));
    }

    public function getCities($id)
    {
        $cities = City::where('province_id', $id)->pluck('city_name','city_id');
        return json_encode($cities);
    }
    public function submit(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin,
            'destination'   => $request->city_destination,
            'weight'        => $request-> weight,
            'courier'       => $request->courier,

        ])->get();

        // sebelumnya
        // $this->harga = $cost;
        // return back()->compact('harga');

        // yang benar
        return response()->json($cost);

    }

    public function order(Request $request)
    {
        Order::create($request->all());
        return "berhasil, cek database";
    }

}
