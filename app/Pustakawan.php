<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pustakawan extends Model
{

	protected $table = "pustakawan_sd";
	public $timestamps = false;
	protected $primaryKey = 'pusNip';

	// public function Prodi(){
	// 	return $this->hasMany('App\Prodi', 'foreign_key', 'prodiKodeJurusan');
	// }
}
