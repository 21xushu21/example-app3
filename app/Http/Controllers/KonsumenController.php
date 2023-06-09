<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KonsumenController extends Controller
{
    public function datakonsumen(){
        $konsumen = Konsumen::all();
        return view('datakonsumen',compact('konsumen'));
    }

    public function create(){
        return view('create');
    }
    public function store(Request $request){
        // dd($request->except('_token','submit'));
        Konsumen::create($request->except('_token','submit'));
        return redirect('/datakonsumen');
    }
    public function edit($id){
        // dd($id);
        $konsumen =Konsumen::find($id);
        dd($konsumen);
        return view('edit',compact(['konsumen']));
    }
    // public function update($id, Request $request){
    //     $konsumen = Konsumen::find($id);
    //     $konsumen->update($request->except(['_token','submit']));
    //     return redirect('/datakonsumen');
    // }

    public function update(Request $request, $id){
        $validation = Validator::make(
            $request->all(),
            [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'nama' => 'required|string|max:500|min:4',
                'email' => 'required|string|max:500|min:4',
                'no_hp' => 'required|numeric',
                'alamat' => 'required|string|max:500',
            ],
            [
                'nama.required' => 'Inputan nama Harus Diisi',
                'nama.max' => 'Inputan nama kebanyakan',
                'nama.min' => 'Inputan nama lebih dari 3',

                'email.required' => 'Inputan email Harus Diisi',
                'email.max' => 'Inputan nama kebanyakan',
                'email.min' => 'Inputan nama lebih dari 3',

                'no_hp.reqired' => 'Inputan no hp harus di isi',
                'no_hp.max' => 'Inputan nama kebanyakan',

                'alamat.reqired' => 'Inputan alamat harus di isi',
                'alamat.max' => 'Inputan nama kebanyakan',

            ]
        );

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }

        $k = Konsumen::whereId($id)->first();
        if ($k->update(
            [
                'nama' => $request->nama,
                'email'=> $request->email,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]
        )

        ) return redirect('/datakonsumen');
    }

    public function destroy($id){
        $konsumen = Konsumen::find($id);
        $konsumen->delete();
        return redirect('/datakonsumen');
    }

    //membuat falidasi
    public function stor3(Request $request ){
        $validation = Validator::make(
            $request->all(),
            [
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4048',
                'nama' => 'required|string|max:500|min:4',
                'email' => 'required|string|max:500|min:4',
                'no_hp' => 'required|numeric',
                'alamat' => 'required|string|max:500',
            ],
            [
                'foto.required' => 'Inputan nama Harus Diisi',
                'foto.max' => 'Inputan nama kebanyakan',


                'nama.required' => 'Inputan nama Harus Diisi',
                'nama.max' => 'Inputan nama kebanyakan',
                'nama.min' => 'Inputan nama lebih dari 3',

                'email.required' => 'Inputan email Harus Diisi',
                'email.max' => 'Inputan nama kebanyakan',
                'email.min' => 'Inputan nama lebih dari 3',

                'no_hp.reqired' => 'Inputan no hp harus di isi',
                'no_hp.max' => 'Inputan nama kebanyakan',

                'alamat.reqired' => 'Inputan alamat harus di isi',
                'alamat.max' => 'Inputan nama kebanyakan',

            ]
        );
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors())->withInput();
        }


        $dk = new Konsumen();
        $dk->name = $request->file('image')->getClientOriginalName();

        $dk->path = $request->file('image')->store('public/images');
        $dk->nama = $request->nama;
        $dk->email = $request->email;
        $dk->no_hp = $request->no_hp;
        $dk->alamat = $request->alamat;

        if($dk->save()){

            // return redirect()->back()->with('success', 'Selamat Inputan Anda Berhasil Diisi!');
            return redirect('/datakonsumen');
        }

    }




}
