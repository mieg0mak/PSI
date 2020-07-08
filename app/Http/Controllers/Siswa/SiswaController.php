<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;

use Validator;
use App\Http\Controllers\Controller;
use App\Siswa as Siswa;

class SiswaController extends Controller
{
  
	public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $dataSiswa = Siswa::select(DB::raw("sisNisn, sisNis, sisNama, sisKelasKode, sisAngkatan, sisStatusAktif"))
        ->get();
        
    $data = array('siswa' => $dataSiswa);   
    return view('admin.dashboard.siswa.siswa',$data);
  }

  public function detail($sisNisn)
  {
    $dataSiswa = Siswa::select(DB::raw("sisNisn, sisNis, sisNama, sisKelasKode, sisAngkatan, sisStatusAktif"))
        ->where('sisNisn','=',$sisNisn)
        ->get();
        
    $data = array('siswa' => $dataSiswa);   
    return view('admin.dashboard.siswa.detailsiswa',$data);
  }

  public function anakWali($kelas)
  {
    $dataSiswa = Siswa::select(DB::raw("sisNisn, sisNis, sisNama, sisKelasKode, sisAngkatan, sisStatusAktif"))
        ->where('sisKelasKode','=',$kelas)
        ->get();
        
    $data = array('siswa' => $dataSiswa);   
    return view('admin.dashboard.siswa.siswa',$data);
  }

  //Tambah Siswa
  public function tambah()
  {
    return view('admin.dashboard.siswa.tambahsiswa');
  }

  public function tambahsiswa(Request $request)
  {
        $input =$request->all();
        $pesan = array(
            'sisNisn.required'    => 'NISN Siswa dibutuhkan.',            
            'sisNisn.unique'      => 'NISN sudah digunakan.',
            'sisNis.required'    => 'NIS Siswa dibutuhkan.',            
            'sisNis.unique'      => 'NIS sudah digunakan.',
            'sisNama.required'   => 'Nama Siswa dibutuhkan.',            
            'sisEmail.required'  => 'Email Siswa dibutuhkan.',            
            'sisEmail.unique'    => 'Email sudah digunakan.',            
            'sisTtl.required'    => 'TTL Siswa dibutuhkan.',            
            'sisAktifM.required' => 'Aktif Mulai dibutuhkan.',
            'sisAktifS.required' => 'Aktif Sampai dibutuhkan.',            
        );

        $aturan = array(
            'sisNisn' => 'required|unique:siswa_sd',
            'sisNis' => 'required|unique:siswa_sd',
            'sisNama' => 'required|max:60',
            'sisEmail' => 'required|unique:siswa_sd',
            'sisAktifS' => [
              'after:'.Input::get('sisAktifM') // This is what we will learn to do
            ],
            'sisTtl' => [
              'before:'.Input::get('sisAktifM') // This is what we will learn to do
            ],
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $siswa = new Siswa;
        $siswa->sisNisn       = $request['sisNisn'];
        $siswa->sisNis        = $input['sisNis'];
        $siswa->sisNama       = $input['sisNama'];
        $siswa->sisEmail      = $input['sisEmail'];
        $siswa->sisJk         = $input['sisJk'];
        $siswa->sisTtl        = $input['sisTtl'];
        $siswa->sisAlamat     = $input['sisAlamat'];
        $siswa->sisKelasKode  = $input['sisKelasKode'];
        $siswa->sisAngkatan     = $input['sisAngkatan'];
        $siswa->sisStatusAktif     = $input['sisStatusAktif'];
        
        if (! $siswa->save())
          App::abort(500);

        return Redirect::action('Siswa\SiswaController@index')
                          ->with('successMessage','Data siswa telah berhasil ditambah.'); 
      
    //return view('admin.dashboard.siswa.siswa');
  }

  public function hapus($id)
  {
    $sisNisn = Siswa::where('sisNisn','=',$id)->first();

    if($sisNisn==null)
      App::abort(404);
    $sisNisn->delete();
    
    return Redirect::route('siswa');

  }

}

