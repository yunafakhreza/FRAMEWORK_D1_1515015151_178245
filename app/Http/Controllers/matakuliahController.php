<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\matakuliah;

class matakuliahController extends Controller
{
  public function awal()
  {
  	return "Hello dari matakuliahController";
  }
  public function tambah()
  {
  	return $this->simpan();
  }
  public function simpan()
  {
  	$matakuliah = new matakuliah();
  	$matakuliah->title = 'Kecerdasan Buatan';
  	$matakuliah->keterangan = 'wajib';
  	$matakuliah->save();
  	return "data dengan title {$matakuliah->title} telah tersimpan";
  }
}
