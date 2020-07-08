<?php

namespace App\Http\Controllers\Absensi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;

use Validator;
use App\Http\Controllers\Controller;
use App\Absensi as Absensi;
use App\Siswa as Siswa;

class AbsensiController extends Controller
{
  
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $dataAbsensi = Absensi::select(DB::raw("absensiId, absensiSisNisn, absensiStatus, absensiSemId, absensiKelasId, absensiTanggal, absensiKeterangan, sisNama"))
        ->join('siswa_sd', 'sisNisn', '=', 'absensiSisNisn')
        ->orderBy((DB::raw("absensiTanggal")), "DESC")        
        ->get();
        
    $data = array('absensi' => $dataAbsensi);   
    return view('admin.dashboard.absensi.absensi',$data);
  }

  public function detail($absensiId)
  {
    $dataAbsensi = Absensi::select(DB::raw("absensiId, absensiSisNisn, sisNama, absensiStatus, absensiSemId, absensiKelasId, absensiTanggal, absensiKeterangan"))
        ->join('siswa_sd', 'sisNisn', '=', 'absensiSisNisn')
        ->where('absensiId','=',$absensiId)
        ->orderBy((DB::raw("absensiTanggal")), "DESC")        
        ->get();
        
    $data = array('absensi' => $dataAbsensi);   
    return view('admin.dashboard.absensi.detailabsensi',$data);
  }

  public function tambah($id)
  {
    $dataSiswa = Siswa::select(DB::raw("sisNisn, sisNis, sisNama, sisKelasKode, sisAngkatan, sisStatusAktif"))
        ->where('sisKelasKode','=',$id)
        ->get();
        
    $data = array('absensi' => $dataSiswa);   
	  return view('admin.dashboard.absensi.tambahabsensi',$data);
  }
}

