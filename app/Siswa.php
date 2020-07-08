<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Siswa extends Model
{

	protected $table = "siswa_sd";
	public $timestamps = false;
	protected $primaryKey = 'sisNisn';

	// public function Prodi(){
	// 	return $this->hasMany('App\Prodi', 'foreign_key', 'prodiKodeJurusan');
	// }
}
