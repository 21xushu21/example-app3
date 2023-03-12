<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StokBarangController extends Controller
{
    public function index(){
        $barang = Barang::all();
        return view('barang.stok_barang',compact('barang'));
    }
    public function createbarang(){
        return view('barang.create_barang');
    }
    public function storebarang(Request $request){
        $validation = Validator::make(
            $request->all(),
            [
                'nama_barang' => 'required|string|max:500|min:4',
                'jumlah_stok' => 'required|max:20|regex:/^((71)|(73)|(77))[0-9]{7}/',
                'harga_satuan' => 'required|max:40|regex:/^((71)|(73)|(77))[0-9]{7}/',
            ],
            [
                'nama.required' => 'Inputan nama Harus Diisi',
                'nama.max' => 'Inputan nama kebanyakan',
                'nama.min' => 'Inputan nama lebih dari 4',

                'jumlah_stok.required' => 'Inputan stok Harus Diisi',
                'jumlah_stok.max' => 'Inputan nama kebanyakan',

                'harga_satuan.reqired' => 'Inputan harga satuan harus di isi',
                'harga_satuan.max' => 'Inputan nama kebanyakan',

            ]
        );
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        // Instansiate Pengadaan Renovasi
        $db = new Barang();
        $db->nama_barang = $request->nama_barang;
        $db->jumlah_stok = $request->jumlah_stok;
        $db->jumlah_terjual = $request->jumlah_terjual;
        $db->harga_satuan = $request->harga_satuan;

        $db->save();

        // Instansiate Rekanan Vendor
        

        if($db->save()){
            // return redirect('/stok');
            return redirect()->back()->with('success', 'Selamat Formulir Anda Berhasil Diisi!');
        }
    }
}
