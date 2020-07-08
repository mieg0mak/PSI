<?php

namespace App\Http\Controllers\Mapel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;

use Validator;
use App\Http\Controllers\Controller;
use App\Mapel as Mapel;
//use App\Jurusan as Jurusan;

class MapelController extends Controller
{
  
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $dataMapel = Mapel::select(DB::raw("mapelKode, mapelNama, mapelGuruId, guruNama, mapelKurId, mapelKelasId"))
        ->join('guru_sd', 'guruId', '=', 'mapelGuruId')    
        ->orderBy(DB::raw("mapelKode"))      
        ->get();
        
    $data = array('mapel' => $dataMapel);   
    return view('admin.dashboard.mapel.mapel',$data);
  }

  public function detail($mapelKode)
  {
    $dataMapel = Mapel::select(DB::raw("mapelKode, mapelNama, mapelGuruId, guruNama, mapelKurId, kurTahun, mapelKelasId"))
        ->join('guru_sd', 'guruId', '=', 'mapelGuruId')
        ->join('kurikulum_sd', 'kurId', '=', 'mapelKurId')
        ->where('mapelKode','=',$mapelKode)
        ->orderBy(DB::raw("mapelKode"))        
        ->get();
        
    $data = array('mapel' => $dataMapel);   
    return view('admin.dashboard.mapel.detailmapel',$data);
  }

}

