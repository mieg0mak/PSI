<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;

use Validator;
use App\Http\Controllers\Controller;
use App\Guru as Guru;


class GuruController extends Controller
{
  
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $dataGuru = Guru::select(DB::raw("guruId, guruNip, guruNama, guruEmail, guruJk, guruTtl, guruAlamat, guruKelasKode, guruAktifM, guruAktifS"))
        ->leftjoin('users', 'users.email', '=', 'guruEmail')
        ->get();
        
    $data = array('guru' => $dataGuru);   
    return view('admin.dashboard.guru.guru',$data);
  }

  public function detail($guruId)
  {
    $dataGuru = Guru::select(DB::raw("guruId, guruNip, guruNama, guruEmail, guruJk, guruTtl, guruAlamat, guruKelasKode, guruAktifM, guruAktifS"))
        ->where('guruId','=',$guruId)
        ->get();
        
    $data = array('guru' => $dataGuru);   
    return view('admin.dashboard.guru.detailguru',$data);
  }

  //Tambah Guru
  public function tambah()
  {
    return view('admin.dashboard.guru.tambahguru');
  }

  public function tambahguru(Request $request)
  {
        $input =$request->all();
        $pesan = array(
            'guruNama.required'   => 'Nama Guru dibutuhkan.',            
            'guruEmail.required'  => 'Email Guru dibutuhkan.',            
            'guruEmail.unique'    => 'Email sudah digunakan.',            
            'guruTtl.required'    => 'TTL Guru dibutuhkan.',            
            'guruAktifM.required' => 'Aktif Mulai dibutuhkan.',
            'guruAktifS.required' => 'Aktif Sampai dibutuhkan.',  
            'guruAktifS.after'    => 'Data Aktif Sampai lebih lama dari Data Aktif Mulai',          
            'guruTtl.after'       => 'Data Aktif Mulai lebih lama dari Data TTL',          
        );

        $aturan = array(
            'guruNama' => 'required|max:60',
            'guruEmail' => 'required|unique:guru_sd',
            'guruTtl'   => 'required',
            'guruAktifS' => [
              'after:'.Input::get('guruAktifM') // This is what we will learn to do
            ],
            'guruTtl' => [
              'before:'.Input::get('guruAktifM') // This is what we will learn to do
            ],
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $guru = new Guru;
        $guru->guruNip = $request['guruNip'];
        $guru->guruNama = $input['guruNama'];
        $guru->guruEmail = $input['guruEmail'];
        $guru->guruJk = $input['guruJk'];
        $guru->guruTtl = $input['guruTtl'];
        $guru->guruAlamat = $input['guruAlamat'];
        $guru->gurukelasKode = $input['guruKelasKode'];
        $guru->guruAktifM = $input['guruAktifM'];
        $guru->guruAktifS = $input['guruAktifS'];
        
        if (! $guru->save())
          App::abort(500);

        return Redirect::action('Guru\GuruController@index')
                          ->with('successMessage','Data guru telah berhasil ditambah.'); 
      
    //return view('admin.dashboard.guru.guru');
  }

  public function hapus($id)
  {
    $guruId = Guru::where('guruId','=',$id)->first();

    if($guruId==null)
      App::abort(404);
    $guruId->delete();
    
    return Redirect::route('guru');

  }
}

