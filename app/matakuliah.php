<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
   protected $table = 'matakuliah';
public function dosen_matakuliah()
{
	return $this->hasMany(dosen_matakuliah::class);
}
}