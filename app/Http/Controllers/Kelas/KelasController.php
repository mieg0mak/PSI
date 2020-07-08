<?php

namespace App\Http\Controllers\Kelas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;

use Validator;
use App\Http\Controllers\Controller;
use App\Kelas as Kelas;
//use App\Jurusan as Jurusan;

class KelasController extends Controller
{
  
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $dataKelas = Kelas::select(DB::raw("kelasKode, kelasNama"))
        ->orderBy(DB::raw("kelasKode"))        
        ->get();
        
    $data = array('kelas' => $dataKelas);   
    return view('admin.dashboard.kelas.kelas',$data);
  }

  public function detail($kelasKode)
  {
    $dataKelas = Kelas::select(DB::raw("kelasKode, kelasNama"))
        ->where('kelasKode','=',$kelasKode)
        ->orderBy(DB::raw("kelasKode"))        
        ->get();
        
    $data = array('kelas' => $dataKelas);   
    return view('admin.dashboard.kelas.detailkelas',$data);
  }

  public function listSiswa($kelasKode)
  {
    $dataKelas = Kelas::select(DB::raw("kelasKode, kelasNama, sisNisn, sisNis, sisNama"))
        ->join('siswa_sd', 'sisKelasKode', '=', 'kelasKode')
        ->where('kelasKode','=',$kelasKode)
        ->orderBy(DB::raw("sisNisn"))
        ->get();
        
    $data = array('kelas' => $dataKelas);   
    return view('admin.dashboard.kelas.daftarsiswa',$data);
  }

}

