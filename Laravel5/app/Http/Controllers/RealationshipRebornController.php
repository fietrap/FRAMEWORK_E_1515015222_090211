<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen;
class RealationshipRebornController extends Controller
{
    public function ujihas(){
    	return dosen::has('dosen_matakuliah')->get();
    }

    public function ujiDoesntHave(){
    	return dosen::doesntHave('dosen_matakuliah')->get();
    }
}
