<?php

namespace App\Http\Controllers\Pustakawan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;

use Validator;
use App\Http\Controllers\Controller;
use App\Pustakawan as Pustakawan;
//use App\Prodi as Prodi;
//use App\Jurusan as Jurusan;

class PustakawanController extends Controller
{
  
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $dataPustakawan = Pustakawan::select(DB::raw("pusId, pusNip, pusNama, pusEmail, pusJk, pusTtl, pusAlamat, pusAktifM, pusAktifS"))
        //->join('program_studi', 'program_studi.prodiKode', '=', 'pus.dsnProdiKode')
        //->join('jurusan','prodiKodeJurusan','=','jurusan.jurKode')
        //->orderBy(DB::raw("prodiKode"))        
        ->get();
        
    $data = array('pustakawan' => $dataPustakawan);   
    return view('admin.dashboard.pustakawan.pustakawan',$data);
  }

  public function detail($pusId)
  {
    $dataPustakawan = Pustakawan::select(DB::raw("pusId, pusNip, pusNama, pusEmail, pusJk, pusTtl, pusAlamat, pusAktifM, pusAktifS"))
        //->join('program_studi', 'program_studi.prodiKode', '=', 'pus.dsnProdiKode')
        //->join('jurusan','prodiKodeJurusan','=','jurusan.jurKode')
        ->where('pusId','=',$pusId)
        //->orderBy(DB::raw("prodiKode"))        
        ->get();
        
    $data = array('pustakawan' => $dataPustakawan);   
    return view('admin.dashboard.pustakawan.detailpustakawan',$data);
  }

  //Tambah Pustakawan
  public function tambah()
  {
    return view('admin.dashboard.pustakawan.tambahpustakawan');
  }

  public function tambahpustakawan(Request $request)
  {
        $input =$request->all();
        $pesan = array(
            'pusNip.required'    => 'NIP Pustakawan dibutuhkan.',            
            'pusNip.unique'      => 'NIP sudah digunakan.',
            'pusNama.required'   => 'Nama Pustakawan dibutuhkan.',            
            'pusEmail.required'  => 'Email Pustakawan dibutuhkan.',            
            'pusEmail.unique'    => 'Email sudah digunakan.',            
            'pusTtl.required'    => 'TTL Pustakawan dibutuhkan.',            
            'pusAktifM.required' => 'Aktif Mulai dibutuhkan.',
            'pusAktifS.required' => 'Aktif Sampai dibutuhkan.',            
        );

        $aturan = array(

            'pusNip' => 'required|unique:pustakawan_sd',
            'pusNama' => 'required|max:60',
            
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $pustakawan = new Pustakawan;
        $pustakawan->pusNip = $request['pusNip'];
        $pustakawan->pusNama = $input['pusNama'];
        $pustakawan->pusEmail = $input['pusEmail'];
        $pustakawan->pusJk = $input['pusJk'];
        $pustakawan->pusTtl = $input['pusTtl'];
        $pustakawan->pusAlamat = $input['pusAlamat'];
        $pustakawan->pusAktifM = $input['pusAktifM'];
        $pustakawan->pusAktifS = $input['pusAktifS'];
        
        if (! $pustakawan->save())
          App::abort(500);

        return Redirect::action('Pustakawan\PustakawanController@index')
                          ->with('successMessage','Data pustakawan telah berhasil ditambah.'); 
      
    //return view('admin.dashboard.pustakawan.pustakawan');
  }

  public function hapus($id)
  {
    $pusNip = Pustakawan::where('pusId','=',$id)->first();

    if($pusNip==null)
      App::abort(404);
    $pusNip->delete();
    
    return Redirect::route('pustakawan');

  }

}

