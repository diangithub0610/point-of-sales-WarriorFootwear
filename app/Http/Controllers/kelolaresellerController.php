<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kelolaresellerController extends Controller
{
    public function index(){
        return view('admin.kelolareseller.tabelreseller');
    }
    function tambahreseller(Request $request){
        $validasi = $request->validate([
            "nama_reseller"=>"required|string",
            "kata_sandi_reseller"=>"required|string",
            "alamat"=>"required|string"
        ]);
        tambahreseller::create($validasi);
        Alert::success('Sukses','berhasil menambahkan reseller');

        //jika tidak diarahkan pada halaman lain
        return redirect()->back();

       // mengarah ke halaman selanjutnya
       // return redirect()->route("dashboard.admin");

    }
}
