<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen;

class dosencontroller extends Controller
{
    public function awal(){
    	return"Dosen Pengampu Matakuliah Framework";
    }
    public function tambah(){
    	return $this->simpan();
    }
    public function simpan(){
    	$dosen = new dosen();
    	$dosen->nama = 'Hario Jati Setyadi';
    	$dosen->nipp = '19820405001';
    	$dosen->pengguna_id= '1';
    	$dosen->save();
    	return "data dengan nama {$dosen->nama} telah disimpan";

    }}