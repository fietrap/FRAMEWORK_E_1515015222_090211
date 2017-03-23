<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\pengguna;
use Input;
use Redirect;
use informasi;

class penggunacontroller extends Controller
{
    public function awal(){
    	return view('pengguna.awal',['data'=>pengguna::all()]);
    }
    public function tambah(){
    	return view('pengguna.tambah');
    }
    public function simpan(Requests $input){
    	$pengguna = new pengguna;
    	$pengguna->username=$input->username;
        $pengguna->password=$input->password;
        $informasi = $pengguna->save() ? 'berhasil input' : 'gagal simpan';
        return redirect('pengguna')->with(['informasi'=>$informasi]);
    }

    public function edit($id){
        $pengguna=pengguna::find($id);
        return view('pengguna.edit', compact('pengguna'));
    }
public function lihat($id){
        $pengguna=pengguna::find($id);
        return view('pengguna.lihat')->with(array('pengguna'=>$pengguna));
    }

    public function update($id, Request $input){
        $pengguna = pengguna::find($id);
        $input=array_except(Input::all(),'_method');
        $pengguna->update($input);

        return redirect::route('pengguna.tambah');
    }
    public function hapus($id){
        $pengguna = pengguna::find($id);
        $informasi = $pengguna->delete() ? 'berhasil hapus data' : 'gagal hapus data';
        return redirect('pengguna')->with(['informasi'=>$informasi]);
    }

    }