<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Absensi extends Model
{

	protected $table = "absensi_sd";
	public $timestamps = false;
	protected $primaryKey = 'absensiId';

	//public function Prodi(){
	//	return $this->hasMany('App\Prodi', 'foreign_key', 'prodiKodeJurusan');
	//}
}
