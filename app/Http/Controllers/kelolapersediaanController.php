<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class kelolapersediaanController extends Controller
{
    public function index(){
        return view('admin.persediaan.create');
    }

    //simpan data baru
    function store(Request $request){
        $validasi = $request->validate([
            "nama_barang"=>"required|string",
            "harga"=>"required|int",
            "deskripsi"=>"required|string",
            "stok"=>"required|int",
            "kategori"=>"required|string",
            "warna"=>"required|string",
            "ukuran"=>"required|int",
            "gambar"=>"file|mimes:jpg,png",

        ]);
        barang::create($validasi);
        Alert::success('Sukses','barang berhasil ditambahkan');

        //jika tidak diarahkan pada halaman lain
        return redirect()->back();

       // mengarah ke halaman selanjutnya
       // return redirect()->route("dashboard.admin");

    }
    //mengarah ke tampil barang
    public function tabel(){
        $barang= barang::all();
        return view('admin.persediaan.index',compact('barang'));
    }

    public function indexupdate($id){
        $barang = barang::find($id);
        return view('admin.persediaan.update', compact('barang'));
    }

    public function update(Request $request, $id){
        $barang = barang::find($id);
           // jika barang tidak ditemukan
        if(!$barang){
            return abort(404);
        }
        $validasi = Validator::make($request->all(),[
            "nama_barang"=>"required|string",
            "harga"=>"required|int",
            "deskripsi"=>"required|string",
            "stok"=>"required|int",
            "kategori"=>"required|string",
            "warna"=>"required|string",
            "ukuran"=>"required|int",
            "gambar"=>"file|mimes:jpg,png",

        ]);
        if($validasi->fails()){
            return redirect()->back()->withErrors($validasi->errors())->withInput();
        }
        $barang-> nama_barang = $request->nama_barang;
        $barang-> harga = $request->harga;
        $barang-> deskripsi = $request->deskripsi;
        $barang-> stok = $request->stok;
        $barang-> kategori = $request->kategori;
        $barang-> warna = $request->warna;
        $barang-> ukuran = $request->ukuran;
        $barang-> gambar = $request->gambar;

        $barang->save();
        

        //redirect berhasil

        Alert::success('Sukses','barang berhasil diubah');

        //jika tidak diarahkan pada halaman lain
        return redirect()->route("barang.tabel");
    }

    public function destroy($id){
        $barang = barang::find($id);
        // jika barang tidak ditemukan
     if(!$barang){
         return abort(404);

    }
    $barang->delete();
    
    Alert::success('Sukses','barang berhasil dihapus');

    //jika tidak diarahkan pada halaman lain
    return redirect()->route("barang.tabel");
    }
    
}