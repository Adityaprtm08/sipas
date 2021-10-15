<?php

namespace App\Controllers;

use App\Models\BagianModel;

class Bagian extends BaseController
{
  protected $bagianModel;

  public function __construct()
  {
    $this->bagianModel = new BagianModel();
  }

  public function index()
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $data = [
      "title" => "Bagian | SIPAS Kantor Pemerintah Desa Kalisalak",
      "bagian" => $this->bagianModel->getBagian()
    ];

    return view("Users/Pengaturan/v_bagian", $data);
  }

  public function create()
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $data = [
      "title" => "Tambah Bagian | SIPAS Kantor Pemerintah Desa Kalisalak",
      'validation' => \Config\Services::validation()
    ];

    return view("Users/Pengaturan/v_tambah_bagian", $data);
  }

  public function save()
  {
    if(!$this->validate([
      'nama_bagian' => [
        'rules' => 'required|is_unique[tbl_bagian.nama_bagian]',
        'errors' => [
          'required' => 'Nama Bagian Wajib Diisi.',
          'is_unique' => 'Nama Bagian Sudah terdaftar'
        ]
      ]
    ])){
      $validation = \Config\Services::validation();
      return redirect()->to('/bagian/create')->withInput()->with('validation', $validation);
    }

    $this->bagianModel->save([
      'nama_bagian' => $this->request->getVar('nama_bagian')
    ]);
    
    session()->setFlashdata('msg', 'Data Berhasil Ditambahkan');
    return redirect()->to('/bagian');
  }

  public function edit($id)
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $data = [
      "title" => "Edit Bagian | SIPAS Kantor Pemerintah Desa Kalisalak",
      'validation' => \Config\Services::validation(),
      'bagian' => $this->bagianModel->getBagian($id)
    ];

    return view("Users/Pengaturan/v_edit_bagian", $data);
  }

  public function update($id)
  {
    if(!$this->validate([
      'nama_bagian' => [
        'rules' => 'required|is_unique[tbl_bagian.nama_bagian]',
        'errors' => [
          'required' => 'Nama Bagian Wajib Diisi.',
          'is_unique' => 'Nama Bagian Sudah terdaftar'
        ]
      ]
    ])){
      $validation = \Config\Services::validation();
      return redirect()->back()->withInput()->with('validation', $validation);
    }

    $this->bagianModel->save([
      'id_bagian' => $id,
      'nama_bagian' => $this->request->getVar('nama_bagian')
    ]);
    
    session()->setFlashdata('msg', 'Data Berhasil Diubah');
    return redirect()->to('/bagian');
  }

  public function delete($id)
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $this->bagianModel->delete($id);
    session()->setFlashdata('msg', 'Data Berhasil Dihapus');
    return redirect()->to('/bagian');
  }
}