<?php

namespace App\Http\Controllers\Nilai;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;

use Validator;
use App\Http\Controllers\Controller;
use App\Nilai as Nilai;

class NilaiController extends Controller
{
  
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $dataNilai = Nilai::select(DB::raw("nilaiId, nilaiGuruId, nilaiSisNisn, nilaiMapelKode, nilaiTugas, nilaiUh, nilaiUts, nilaiUas, nilaiPerilaku, nilaiKeterangan, guruNama, sisNama, mapelKelasId"))
        ->join('guru_sd','guruId','=','nilaiGuruId')
        ->join('siswa_sd','sisNisn','=','nilaiSisNisn')
        ->join('matapelajaran_sd','mapelKode','=','nilaiMapelKode')
        ->get();
        
    $data = array('nilai' => $dataNilai);   
    return view('admin.dashboard.nilai.nilai',$data);
  }

  public function detail($nilaiId)
  {
    $dataNilai = Nilai::select(DB::raw("nilaiId, nilaiGuruId, nilaiSisNisn, nilaiMapelKode, nilaiTugas, nilaiUh, nilaiUts, nilaiUas, nilaiPerilaku, nilaiKeterangan, guruNama, sisNama, mapelKelasId"))
        ->join('guru_sd','guruId','=','nilaiGuruId')
        ->join('siswa_sd','sisNisn','=','nilaiSisNisn')
        ->join('matapelajaran_sd','mapelKode','=','nilaiMapelKode')
        ->where('nilaiId','=',$nilaiId)
        ->get();
        
    $data = array('nilai' => $dataNilai);   
    return view('admin.dashboard.nilai.detailnilai',$data);
  }

  public function dataNilai($data)
  {
    $dataNilai = Nilai::select(DB::raw("nilaiId, nilaiGuruId, nilaiSisNisn, nilaiMapelKode, nilaiTugas, nilaiUh, nilaiUts, nilaiUas, nilaiPerilaku, nilaiKeterangan, guruNama, guruKelasKode, sisNama, mapelKelasId"))
        ->join('guru_sd','guruId','=','nilaiGuruId')
        ->join('siswa_sd','sisNisn','=','nilaiSisNisn')
        ->join('matapelajaran_sd','mapelKode','=','nilaiMapelKode')
        ->where('guruKelasKode','=',$data)
        ->get();
        
    $data = array('nilai' => $dataNilai);   
    return view('admin.dashboard.nilai.nilai',$data);
  }

  public function edit($id)
  {
	  // mengambil data berdasarkan id yang dipilih
    $nilai = Nilai::select(DB::raw("nilaiId, nilaiGuruId, nilaiSisNisn, nilaiMapelKode, nilaiTugas, nilaiUh, nilaiUts, nilaiUas, nilaiPerilaku, nilaiKeterangan, mapelKelasId"))
        ->join('matapelajaran_sd','mapelKode','=','nilaiMapelKode')
        ->where('nilaiId','=',$id)
        ->get();
	  // passing data yang didapat ke view edit.blade.php
	  return view('admin.dashboard.nilai.editnilai', ['nilai' => $nilai]);
  }

  public function update(Request $request)
  {
    // update data 
    $nilai = Nilai::select(DB::raw("nilaiId"))
      ->where('nilaiId','=',$request->id)
      ->update([
		            'nilaiTugas' => $request->nilaiTugas,
		            'nilaiUh' => $request->nilaiUh,
		            'nilaiUts' => $request->nilaiUts,
                'nilaiUas' => $request->nilaiUas,
                'nilaiPerilaku' => $request->nilaiPerilaku,
                'nilaiKeterangan' => $request->nilaiKeterangan
	    ]);
    // alihkan halaman ke halaman
    return redirect('datanilai/'.$request->kelas);
  }

  // // Edit Nilai
  //   //Tambah Guru
  // public function edit()
  // {
  //   return view('admin.dashboard.nilai.editnilai');
  // }

  // public function editNilai(Request $request)
  // {
  //       $input =$request->all();
  //       $pesan = array(
  //           // 'guruNip.required'    => 'NIP Guru dibutuhkan.',            
  //           // 'guruNip.unique'      => 'NIP sudah digunakan.',
  //           // 'guruNama.required'   => 'Nama Guru dibutuhkan.',            
  //           // 'guruEmail.required'  => 'Email Guru dibutuhkan.',            
  //           // 'guruEmail.unique'    => 'Email sudah digunakan.',            
  //           // 'guruTtl.required'    => 'TTL Guru dibutuhkan.',            
  //           // 'guruAktifM.required' => 'Aktif Mulai dibutuhkan.',
  //           // 'guruAktifS.required' => 'Aktif Sampai dibutuhkan.',            
  //       );

  //       $aturan = array(

  //           // 'guruNip' => 'required|unique:guru_sd',
  //           // 'guruNama' => 'required|max:60',
            
  //       );
        

  //       $validator = Validator::make($input,$aturan, $pesan);

  //       if($validator->fails()) {
  //           # Kembali kehalaman yang sama dengan pesan error
  //           return Redirect::back()->withErrors($validator)->withInput();

  //         # Bila validasi sukses
  //       }

  //       $nilai = new Nilai();
  //       $nilai->nilaiGuruId      = $input['nilaiGuruId'];
  //       $nilai->nilaiSisNisn     = $input['nilaiSisNisn'];
  //       $nilai->nilaiMapelKode   = $input['nilaiMapelKode'];
  //       $nilai->nilaiTugas       = $input['nilaiTugas'];
  //       $nilai->nilaiUh          = $input['nilaiUh'];
  //       $nilai->nilaiUts         = $input['nilaiUts'];
  //       $nilai->nilaiUas         = $input['nilaiUas'];
  //       $nilai->nilaiPerilaku    = $input['nilaiPerilaku'];
  //       $nilai->nilaiKeterangan  = $input['nilaiKeterangan'];
        
  //       if (! $nilai->save())
  //         App::abort(500);

  //       return Redirect::action('Nilai\NilaiController@index')
  //                         ->with('successMessage','Data nilai telah berhasil diedit.'); 
      
  //   //return view('admin.dashboard.guru.guru');
  // }

  public function hapus($id)
  {
    $nilaiId = Nilai::where('nilaiId','=',$id)->first();

    if($nilaiId==null)
      App::abort(404);
    $nilaiId->delete();
    
    return Redirect::route('nilai');

  }
}

