<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\dosen;
use App\dosen_matakuliah;
use App\matakuliah;
use Input;
use Redirect;
use informasi;

class dosen_matakuliahcontroller extends Controller
{
    public function awal(){
        return view('dosen_matakuliah.awal',['data'=>dosen_matakuliah::all()]);
    }
    public function tambah(){
        return view('dosen_matakuliah.tambah');
    }
    public function simpan(Request $input){
        $dosen_matakuliah = new dosen_matakuliah;
        $dosen_matakuliah->dosen_id=$input->dosen_id;
        $dosen_matakuliah->matakuliah_id=$input->matakuliah_id;
                $informasi = $dosen_matakuliah->save() ? 'berhasil input' : 'gagal simpan';
        return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
    }

    public function edit($id){
        $dosen_matakuliah=dosen_matakuliah::find($id);
        return view('dosen_matakuliah.edit')->with(array('dosen_matakuliah'=>$dosen_matakuliah));
    }
public function lihat($id){
        $dosen_matakuliah=dosen_matakuliah::find($id);
        return view('dosen_matakuliah.lihat')->with(array('dosen_matakuliah'=>$dosen_matakuliah));
    }

    public function update($id, Request $input){
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $dosen_matakuliah ->dosen_id=$input->dosen_id;
        $dosen_matakuliah ->matakuliah_id=$input->matakuliah_id;
        $informasi = $dosen_matakuliah->save()? 'berhasil update' : 'gagal ya';

        return redirect('dosen_matakuliah')-> with(['informasi'=>$informasi]);
    }
    public function hapus($id){
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $informasi = $dosen_matakuliah->delete() ? 'berhasil hapus data' : 'gagal hapus data';
        return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
    }

    }