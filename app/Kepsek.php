<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Kepsek extends Model
{

	protected $table = "kepsek_sd";
	public $timestamps = false;
	protected $primaryKey = 'kepsekNip';

	//public function Prodi(){
	//	return $this->hasMany('App\Prodi', 'foreign_key', 'prodiKodeJurusan');
	//}
}
