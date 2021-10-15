<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\PenggunaModel;

class Auth extends Controller
{
  public function index()
  {
      helper(['form']);
      $data = [
        'title' => 'Selamat Datang di SIPAS Kantor Pemerintah Desa Kalisalak',
        'validation' => \Config\Services::validation()
      ];
      return view('Auth/v_login', $data);
  } 

  public function ceklogin()
  {
    if(!$this->validate([
      'username' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Username Wajib Diisi.'
        ]
      ],
      'password' => [
      'rules' => 'required',
      'errors' => [
        'required' => 'Password Wajib Diisi.'
      ]
      ],
    ])){
      $validation = \Config\Services::validation();
      return redirect()->to('/Auth')->withInput()->with('validation', $validation);
    }
        
    $session = session();
    $model = new PenggunaModel();
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    $data = $model->where('username', $username)->first();
    if ($data) {
      if ($data['password'] !== md5($password)) {
        $session->setFlashdata('msg', 'Password Anda Salah');
        $validation = \Config\Services::validation();
        return redirect()->to('/Auth')->withInput()->with('validation', $validation);
      } 
      else {
        $sess_Data = [
          'id_user'       => $data['id_user'],
          'username'      => $data['username'],
          'nama_lengkap'  => $data['nama_lengkap'],
          'email'         => $data['email'],
          'level'         => $data['level'],
          'id_bagian'     => $data['id_bagian'],
          'alamat'        => $data['alamat'],
          'telepon'       => $data['telepon'],
          'foto_profil'   => $data['foto_profil'],
          'logged_in'     => TRUE
        ];

        session()->set($sess_Data);
        session()->setFlashdata('success','Halo ' . $data['nama_lengkap'] . ', Selamat Anda Berhasil Login.');
        return redirect()->to('/Dashboard');
      }        
    }
    else{
      $session->setFlashdata('msg', 'Username Tidak Terdaftar');
      return redirect()->to('/Auth');
    }
  }

  public function logout()
  {
    $session = session();
    session()->remove('id_user');
    session()->remove('username');
    session()->remove('logged_in');
    $session->setFlashdata('scs', 'Anda Berhasil Logout');
    return redirect()->to('/Auth');
  }
} 