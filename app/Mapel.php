<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mapel extends Model
{

	protected $table = "matapelajaran_sd";
	public $timestamps = false;
	protected $primaryKey = 'mapel_Kode';

	//public function Prodi(){
	//	return $this->hasMany('App\Prodi', 'foreign_key', 'prodiKodeJurusan');
	//}
}
