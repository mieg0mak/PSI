<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
//use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use App\Click as Click;
use App\View as View;
use App\Kepsek as Kepsek;
use App\Guru as Guru;


class AdminController extends Controller
{

    public function __construct(Request $request)
    {
      $this->middleware('auth');
    }

        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    
    public function index(Request $request){
      $level = Auth::user()->level;

      switch ($level) {
        case "1":
            return $this->dashboardLevel1(); //Admin
            break;
        case "4":            
            return $this->dashboardLevel4($request); //Kepsek
            break;
        case "5":            
            return $this->dashboardLevel5($request); //Guru
            break;
        default:
            echo "Dashboard Larasia!";
      }
    }

    protected function dashBoardLevel1(){

      return view('admin.dashboard.index.mainadmin');
    }

    protected function dashBoardLevel4(Request $request){
      $kepsekEmail = Auth::user()->email;
      $kepsekNama = Kepsek::where('kepsekEmail','=',$kepsekEmail)->first();
      $request->session()->set('kepsekEmail', $kepsekNama['kepsekEmail']); 
      
      return view('admin.dashboard.index.mainkepsek');
    }


    protected function dashBoardLevel5(Request $request){
      $guruEmail = Auth::user()->email;
      $guruNama = Guru::where('guruEmail','=',$guruEmail)->first();
      $request->session()->set('guruEmail', $guruNama['guruEmail']); 
      
      return view('admin.dashboard.index.mainguru');
    }
  }