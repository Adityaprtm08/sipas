<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

use App\Models\BagianModel;

class Profile extends BaseController
{
	protected $PenggunaModel;
	protected $BagianModel;

  public function __construct()
  {
    $this->PenggunaModel = new PenggunaModel();
    $this->BagianModel = new BagianModel();
  }

	public function index()
	{
		$data = [
			'title' => 'Profile | SIPAS Kantor Pemerintah Desa Kalisalak',
      'pengguna' => $this->PenggunaModel->getPengguna(session()->get('id_user')),

		];

		return view('Users/Profile/v_profile', $data);
	}

	public function edit()
	{
		$user_session = session()->get('id_user');
		if (!($user_session)) {
				return redirect()->to('/auth');
		}
	
    $data = [
      'title' => 'Edit Profile | SIPAS Kantor Pemerintah Desa Kalisalak',
      'validation' => \Config\Services::validation(),
      'pengguna' => $this->PenggunaModel->getPengguna(session()->get('id_user')),
		];

		return view("Users/Profile/v_edit_profile", $data);
	}

	public function update()
  {
    if(!$this->validate([
      'nama_lengkap' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama Lengkap Wajib Diisi.',
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'E-mail Wajib Diisi.',
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
	return;
    }
    
      // Generate Nama Foto Profile Random
      $namaFoto = $fileFoto->getRandomName();

      //Pindahkan Gambar
      $fileFoto->move('img/profile', $namaFoto);

      //Hapus Foto Lama
      if($this->request->getVar('fotoLama') != 'default.png'){
        unlink('img/profile/' . $this->request->getVar('fotoLama'));
      }
    


    $this->PenggunaModel->save([
      'id_user' => session()->get('id_user'),
      'nama_lengkap' => $this->request->getVar('nama_lengkap'),
      'email' => $this->request->getVar('email'),
      'alamat' => $this->request->getVar('alamat'),
      'telepon' => $this->request->getVar('telepon'),
      'foto_profil' => $namaFoto
    ]);
    
    session()->setFlashdata('msg', 'Data Berhasil Diubah');
    return redirect()->to('/profile');
  }

	public function editPassword()
	{
			$user_session = session()->get('id_user');
			if (!($user_session)) {
					return redirect()->to('/auth');
			}

			$data = [
					'title' => 'Ubah Password | SIPAS Kantor Pemerintah Desa Kalisalak',
					'validation' => \Config\Services::validation(),
					'pengguna' => $this->PenggunaModel->getPengguna(session()->get('id_user'))
			];

			return view('Users/Profile/v_change_password', $data);
	}

	public function updatePassword()
	{
		$user_session = session()->get('id_user');
		if (!($user_session)) {
			return redirect()->to('/auth');
		}

		if (!$this->validate([
				'password' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Password harus diisi.',
					]
				],
				'newpassword' => [
					'rules' => 'required',
					'errors' => [
						'required' => 'Password baru harus diisi.',
					]
				],
				'confirmpassword' => [
					'rules' => 'required|matches[newpassword]',
					'errors' => [
						'required' => 'Konfirmasi password baru harus diisi.',
						'matches' => 'Konfirmasi password salah, silahkan ulangi.'
					]
				]
		])) {

			$validation = \Config\Services::validation();

			return redirect()->back()->withInput()->with('validation', $validation);
		}

		$pengguna = $this->PenggunaModel->getPengguna(session()->get('id_user'));
		$npassword = md5($this->request->getVar('password'));
		$oldpassword = $pengguna['password'];

		if ($npassword == $oldpassword) {
			$this->PenggunaModel->save([
				'id_user' => session()->get('id_user') ,
				'password' => md5($this->request->getVar('newpassword'))
			]);

			session()->setFlashdata('msg', 'Password Berhasil Diubah');
			return redirect()->to('/profile');
		}
		else {
			session()->setFlashdata('msg', 'Masukkan Password Dengan Benar!');

			return redirect()->back()->withInput();
		}
	}
}
