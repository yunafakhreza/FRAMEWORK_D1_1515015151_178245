<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
   protected $table = 'ruangan';
   protected $fillable = ['title'];

   public function jadwal_matakuliah()
   {
   	return $this->hasMany(jadwal_matakuliah::class);
   }
}
