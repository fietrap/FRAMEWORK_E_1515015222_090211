<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\jadwal_matakuliah;

class jadwal_matakuliahcontroller extends Controller
{
    public function awal(){
    	return"Jam perkuliahan";
    }
    public function tambah(){
    	return $this->simpan();
    }
    public function simpan(){
    	$jadwal_matakuliah = new jadwal_matakuliah();
    	$jadwal_matakuliah->mahasiswa_id = '1';
    	$jadwal_matakuliah->ruangan_id = '14';
    	$jadwal_matakuliah->dosen_matakuliah_id = '2';
    	$jadwal_matakuliah->save();
    	return "data jam perkuliahan {$jadwal_matakuliah->mahasiswa_id} telah disimpan";

    }
    }