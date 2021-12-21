<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Database\Seeders\BarangSeeder;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {

        $data['barang'] = DB::table('tb_barang')->get();
        return view('barang', $data);
    }
    public function tampil()
    {

        $data['detail'] = DB::table('tb_barang')
            ->leftJoin('tb_detail', 'tb_barang.id_barang', '=', 'tb_detail.id_barang')
            ->get();

        $data['barang'] = DB::table('tb_barang')->get();

        return view('tabel', $data);
    }



    public function prosesTambah(Request $request)
    {



        foreach ($request->detail_makanan as $value) {
            if (!empty($value)) {
                $data['proses'] =  DB::table('tb_detail')->insert([
                    'id_barang' => $request->tmakanan,
                    'detail_makanan' => $value,
                ]);
            }
        }
        return response()->json($data);
    }
}
