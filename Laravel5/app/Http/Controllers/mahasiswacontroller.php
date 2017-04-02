<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\mahasiswa;
use App\pengguna;
use Input;
use Redirect;
use informasi;

class mahasiswacontroller extends Controller
{
    public function awal(){
        return view('mahasiswa.awal',['data'=>mahasiswa::all()]);
    }
    public function tambah(){
        return view('mahasiswa.tambah');
    }
    public function simpan(Request $input){
        $mahasiswa = new mahasiswa;
        $mahasiswa->nama=$input->nama;
        $mahasiswa->nim=$input->nim;
        $mahasiswa->pengguna_id=$input->pengguna_id;
                $informasi = $mahasiswa->save() ? 'berhasil input' : 'gagal simpan';
        return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    }

    public function edit($id){
        $mahasiswa=mahasiswa::find($id);
        return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
    }
public function lihat($id){
        $mahasiswa=mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function update($id, Request $input){
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa ->nama=$input->nama;
        $mahasiswa ->nim=$input->nim;
        $informasi = $mahasiswa->save()? 'berhasil update' : 'gagal ya';

        return redirect('mahasiswa')-> with(['informasi'=>$informasi]);
    }
    public function hapus($id){
        $mahasiswa = mahasiswa::find($id);
        $informasi = $mahasiswa->delete() ? 'berhasil hapus data' : 'gagal hapus data';
        return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    }

    }