<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

use App\Models\BagianModel;

class Pengguna extends BaseController
{
  protected $penggunaModel;
  protected $bagianModel;

  public function __construct()
  {
    $this->penggunaModel = new PenggunaModel();
    $this->bagianModel = new BagianModel();
  }

  public function index()
	{
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
		$data = [
			'title' => 'Pengguna | SIPAS Kantor Pemerintah Desa Kalisalak',
      'pengguna' => $this->penggunaModel->getPengguna(),

		];

		return view('Users/Pengaturan/v_pengguna', $data);
	}

  public function create()
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $data = [
      'title' => 'Tambah Pengguna | SIPAS Kantor Pemerintah Desa Kalisalak',
      'validation' => \Config\Services::validation(),
      'bagian' => $this->bagianModel->getBagian()
    ];

      return view('Users/Pengaturan/v_tambah_pengguna', $data);
  }

  public function save()
  {
    if(!$this->validate([
      'level' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Level Wajib Diisi.',
        ]
      ],
      'nama_lengkap' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama Lengkap Wajib Diisi.',
        ]
      ],
      'username' => [
        'rules' => 'required|is_unique[tbl_user.username]',
        'errors' => [
          'required' => 'Username Wajib Diisi.',
          'is_unique' => 'Username Sudah terdaftar.'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password Wajib Diisi.',
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'E-mail Wajib Diisi.',
        ]
      ],
      'id_bagian' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Bagian Wajib Diisi.',
        ]
      ],
      'alamat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat Wajib Diisi.',
        ]
      ],
      'telepon' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Telepon Wajib Diisi.',
        ]
      ],
      'foto_profil' => [
        'rules' => 'max_size[foto_profil,1024]|is_image[foto_profil]|mime_in[foto_profil,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar Terlalu Besar. Maksimal 1MB',
          'is_image' => 'Mohon Pilih File Berekstensi .JPG/.JPEG/.PNG',
          'mime_in' => 'Mohon Pilih File Berekstensi .JPG/.JPEG/.PNG',
        ]
      ],
    ])){

      return redirect()->to('/pengguna/create')->withInput();
    }

    //Ambil File Foto
    $fileFoto = $this->request->getFile('foto_profil');
    //Cek Upload foto
    if($fileFoto->getError() == 4){
      $namaFoto = ('default.png');
    }
    else{
      // Generate Nama Foto Profile Random
      $namaFoto = $fileFoto->getRandomName();

      //Pindahkan Ke Folder img
      $fileFoto ->move('img/profile', $namaFoto);
    }

    $this->penggunaModel->save([
      'level' => $this->request->getVar('level'),
      'nama_lengkap' => $this->request->getVar('nama_lengkap'),
      'username' => $this->request->getVar('username'),
      'password' => md5($this->request->getVar('password')),
      'email' => $this->request->getVar('email'),
      'id_bagian' => $this->request->getVar('id_bagian'),
      'alamat' => $this->request->getVar('alamat'),
      'telepon' => $this->request->getVar('telepon'),
      'foto_profil' => $namaFoto,
    ]);
    
    session()->setFlashdata('msg', 'Data Berhasil Ditambahkan');
    return redirect()->to('/pengguna');
  }

  public function detail($id)
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $data = [
      'title' => 'Detail Pengguna | SIPAS Kantor Pemerintah Desa Kalisalak',
      'pengguna' => $this->penggunaModel->getPengguna($id)
    ];

    return view('Users/Pengaturan/v_detail_pengguna', $data);
  }

  public function edit($id)
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $data = [
      'title' => 'Edit Pengguna | SIPAS Kantor Pemerintah Desa Kalisalak',
      'validation' => \Config\Services::validation(),
      'pengguna' => $this->penggunaModel->getPengguna($id),
      'bagian' => $this->bagianModel->getBagian()
    ];

    return view("Users/Pengaturan/v_edit_pengguna", $data);
  }

  public function update($id)
  {
    $penggunaLama = $this->penggunaModel->getPengguna($id);
    if($penggunaLama['username'] == $this->request->getVar('username')){
      $rule_username = 'required';
    }
    else{
      $rule_username ='required|is_unique[tbl_user.username]';
    }
    if(!$this->validate([
      'level' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Level Wajib Diisi.',
        ]
      ],
      'nama_lengkap' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama Lengkap Wajib Diisi.',
        ]
      ],
      'username' => [
        'rules' => $rule_username,
        'errors' => [
          'required' => 'Username Wajib Diisi.',
          'is_unique' => 'Username Sudah terdaftar.'
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'E-mail Wajib Diisi.',
        ]
      ],
      'id_bagian' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Bagian Wajib Diisi.',
        ]
      ],
      'alamat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat Wajib Diisi.',
        ]
      ],
      'telepon' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Telepon Wajib Diisi.',
        ]
      ],
      'foto_profil' => [
        'rules' => 'max_size[foto_profil,1024]|is_image[foto_profil]|mime_in[foto_profil,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran Gambar Terlalu Besar. Maksimal 1MB',
          'is_image' => 'Mohon Pilih File Berekstensi .JPG/.JPEG/.PNG',
          'mime_in' => 'Mohon Pilih File Berekstensi .JPG/.JPEG/.PNG',
        ]
      ],
    ])){
      // $validation = \Config\Services::validation();
      return redirect()->back()->withInput();
    }

    $fileFoto = $this->request->getFile('foto_profil');

    // cek Gambar, Apakah Update atau Tidak
    if($fileFoto->getError() == 4){
      $namaFoto = $this->request->getVar('fotoLama');
    }
    else{
      // Generate Nama Foto Profile Random
      $namaFoto = $fileFoto->getRandomName();

      //Pindahkan Gambar
      $fileFoto->move('img/profile', $namaFoto);

      //Hapus Foto Lama
      if($this->request->getVar('fotoLama') != 'default.png'){
        unlink('img/profile/' . $this->request->getVar('fotoLama'));
      }
    }


    $this->penggunaModel->save([
      'id_user' => $id,
      'level' => $this->request->getVar('level'),
      'nama_lengkap' => $this->request->getVar('nama_lengkap'),
      'username' => $this->request->getVar('username'),
      'email' => $this->request->getVar('email'),
      'id_bagian' => $this->request->getVar('id_bagian'),
      'alamat' => $this->request->getVar('alamat'),
      'telepon' => $this->request->getVar('telepon'),
      'foto_profil' => $namaFoto
    ]);
    
    session()->setFlashdata('msg', 'Data Berhasil Diubah');
    return redirect()->to('/pengguna');
  }

  public function delete($id)
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $pengguna = $this->penggunaModel->find($id);
    if($pengguna['foto_profil'] != 'default.png'){
      unlink('img/profile/'. $pengguna['foto_profil']);
    }

    $this->penggunaModel->delete($id);
    session()->setFlashdata('msg', 'Data Berhasil Dihapus');
    return redirect()->to('/pengguna');
  }
}
