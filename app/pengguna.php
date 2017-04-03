<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table = 'pengguna';
    protected $fillable = ['username','password'];


		public function dosen(){
		return $this->hasOne(Dosen::class);
		
		}



public function mahasiswa()
{
	return $this->hasOne(Mahasiswa::class);
	
}

public function peran()
{
	return $this->belongToMany(peran::class);
$pengguna= App\Pengguna::find(1);
foreach($pengguna->peran as $peran){
	$pengugna=App\Pengguna::find(1)->where('peran_id','2')->get();
}
	
	}	
}
	
