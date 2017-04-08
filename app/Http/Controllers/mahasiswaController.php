<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\mahasiswa;

use App\pengguna;

class mahasiswaController extends Controller
{
  protected $informasi = 'Gagal melakukan aksi';
  public function awal()
  {
    $semuaMahasiswa = mahasiswa::all();
  	return view('mahasiswa.awal', compact('semuaMahasiswa'));
  }
  public function tambah()
  {
  	return view('mahasiswa.tambah');
  }
  public function simpan(Request $input)
  {
    $pengguna = new pengguna($input->only('username','password'));
      if ($pengguna->save())
      {
  	$mahasiswa = new mahasiswa;
  	$mahasiswa->nama = $input->nama;
  	$mahasiswa->nim = $input->nim;
  	$mahasiswa->alamat = $input->alamat;
      if ($pengguna->mahasiswa()->save($mahasiswa)) $this->informasi = 'Berhasil simpan data';
    }
      return redirect('mahasiswa')->with(['informasi' => $this->informasi]);
    }
    public function edit($id)
    {
      $mahasiswa = mahasiswa::find($id);
      return view('mahasiswa.edit')->with(array('mahasiswa' => $mahasiswa));
    }
    public function lihat($id)
    {
      $mahasiswa = mahasiswa::find($id);
      return view('mahasiswa.lihat')->with(array('mahasiswa' => $mahasiswa));
    }
    public function update($id, Request $input)
    {
      $mahasiswa = mahasiswa::find($id);
      $mahasiswa->nama = $input->nama;
      $mahasiswa->nim = $input->nim;
      $mahasiswa->alamat = $input->alamat;
      $mahasiswa->save();
      
        if (!is_null($input->username))
        {
          $pengguna = $mahasiswa->pengguna->fill($input->only('username'));
          if (!empty($input->password)) $pengguna->password = $input->password;
          if ($pengguna->save()) $this->informasi = 'Berhasil simpan data';
        }
        else
        {
          $this->informasi = 'Berhasil simpan data';
        }
        
        return redirect('mahasiswa')->with(['informasi' => $this->informasi]);
      }
      public function hapus($id)
      {
        $mahasiswa = mahasiswa::find($id);
        if ($mahasiswa->pengguna()->delete())
        {
          if ($mahasiswa->delete()) $this->informasi = 'Berhasil hapus data';
        }
        return redirect('mahasiswa')->with(['informasi' => $this->informasi]);
        }
  }