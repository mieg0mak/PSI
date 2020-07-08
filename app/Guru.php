<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Guru extends Model
{

	protected $table = "guru_sd";
	public $timestamps = false;
	protected $primaryKey = 'guruNip';

	// public function Prodi(){
	// 	return $this->hasMany('App\Prodi', 'foreign_key', 'prodiKodeJurusan');
	// }
}
