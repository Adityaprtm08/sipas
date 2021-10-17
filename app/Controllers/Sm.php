<?php

namespace App\Controllers;

use App\Models\SmModel;

use App\Models\BagianModel;

use App\Libraries\Fungsi;

class Sm extends BaseController
{
	protected $smModel;
	protected $bagianModel;

	public function __construct()
  {
    $this->smModel = new SmModel();
		$this->bagianModel = new BagianModel();
    $this->fungsi = new Fungsi();
  }

public function getVariabel($str){
	$this->request->getVar($str)
}

  public function index()
	{
    $id_bagian = $this->fungsi->getUserData(session()->get('id_user'))[0] ['id_bagian'];
    if (session() -> get('level') == 'admin'){
      $sm = $this->smModel->getSm();
    }
    else{
      $sm = $this->smModel->getSmByIdBagian($id_bagian);
    }

		$data = [
			'title'			  => 'Surat Masuk | SIPAS Kantor Pemerintah Desa Kalisalak',
			'suratmasuk'  => $sm,
		];

		return view('Users/Pengarsipan/v_sm', $data);
	}

  public function create()
	{
		if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $data = [
      'title' => 'Tambah Surat Masuk | SIPAS Kantor Pemerintah Desa Kalisalak',
			'validation' => \Config\Services::validation(),
      'bagian' => $this->bagianModel->getBagian()
    ];

      return view('Users/Pengarsipan/v_tambah_sm', $data);
  }

  public function save()
  {
    if(!$this->validate([
      'nomor_surat' => [
        'rules' => 'required|is_unique[tbl_sm.nomor_surat]',
        'errors' => [
          'required' => 'Nomor Surat Wajib Diisi.',
          'is_unique' => 'Nomor Surat Sudah Terpakai.'
        ]
      ],
      'tanggal_surat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Surat Wajib Diisi.',
        ]
      ],
      'nomor_agenda' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomor Agenda Wajib Diisi.',
        ]
      ],
      'tanggal_terima' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Terima Surat Wajib Diisi.',
        ]
      ],
      'sifat_surat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Sifat Surat Wajib Diisi.',
        ]
      ],
      'pengirim' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Pengirim Wajib Diisi.',
        ]
      ],
      'perihal' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Perihal Wajib Diisi.',
        ]
      ],
      'lampiran' => [
        'rules' => 'uploaded[lampiran]|max_size[lampiran,10000]|ext_in[lampiran,doc,docx,pdf]',
        'errors' => [
					'uploaded' => 'Lampiran Wajib Diisi',
          'max_size' => 'Ukuran File Lampiran Terlalu Besar. Maksimal 10MB',
          'ext_in' => 'Mohon Pilih File Berekstensi .DOC/.DOCX/.PDF',
        ]
      ],
    ])){

      return redirect()->to('/sm/create')->withInput();
    }

    //Ambil File Foto
    $fileLampiran = $this->request->getFile('lampiran');

    //Pindahkan Ke Folder img
    $fileLampiran->move('img/lampiran/surat_masuk');

		$namaLampiran = $fileLampiran->getName();

    $this->smModel->save([
      'nomor_surat' => getVariabel('nomor_surat'),
      'tanggal_surat' => getVariabel('tanggal_surat'),
      'tanggal_terima' => getVariabel('tanggal_terima'),
      'nomor_agenda' => getVariabel('nomor_agenda'),
      'sifat_surat' => getVariabel('sifat_surat'),
      'pengirim' => getVariabel('pengirim'),
      'perihal' => getVariabel('perihal'),
      'id_bagian' => getVariabel('id_bagian'),
      'isi_disposisi' => getVariabel('isi_disposisi'),
      'lampiran' => $namaLampiran
    ]);
    
    session()->setFlashdata('msg', 'Data Berhasil Ditambahkan');
    return redirect()->to('/sm');
  }

  public function detail($id)
	{
		$data = [
			'title'				=> 'Surat Masuk | SIPAS Kantor Pemerintah Desa Kalisalak',
			'suratmasuk' => $this->smModel->getSm($id)
		];

		return view('Users/Pengarsipan/v_detail_sm', $data);
	}

  public function cetak_disposisi($id)
  {
		$data = [
			'title'				=> 'Cetak Disposisi Surat Masuk | SIPAS Kantor Pemerintah Desa Kalisalak',
			'suratmasuk'  => $this->smModel->getSm($id)
		];

		return view('Users/Pengarsipan/v_cetak_disposisi', $data);
  }

  public function edit($id)
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $data = [
      'title'       => 'Edit Surat Masuk | SIPAS Kantor Pemerintah Desa Kalisalak',
			'validation'  => \Config\Services::validation(),
      'suratmasuk'  => $this->smModel->getSm($id),
      'bagian'      => $this->bagianModel->getBagian()
    ];

    return view("Users/Pengarsipan/v_edit_sm", $data);
  }

  public function update($id)
  {
    $smLama = $this->smModel->getSm($id);
    if($smLama['nomor_surat'] == $this->request->getVar('nomor_surat')){
      $rule_nomor_surat = 'required';
    }
    else{
      $rule_nomor_surat ='required|is_unique[tbl_sm.nomor_surat]';
    }
    if(!$this->validate([
      'nomor_surat' => [
        'rules' => $rule_nomor_surat,
        'errors' => [
          'required' => 'Nomor Surat Wajib Diisi.',
          'is_unique' => 'Nomor Surat Sudah Terpakai.'
        ]
      ],
      'tanggal_surat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Surat Wajib Diisi.',
        ]
      ],
      'tanggal_terima' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Terima Surat Wajib Diisi.',
        ]
      ],
      'nomor_agenda' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomor Agenda Wajib Diisi.',
        ]
      ],
      'sifat_surat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Sifat Surat Wajib Diisi.',
        ]
      ],
      'pengirim' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Pengirim Wajib Diisi.',
        ]
      ],
      'perihal' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Perihal Wajib Diisi.',
        ]
      ],
      'lampiran' => [
        'rules' => 'max_size[lampiran,10000]|ext_in[lampiran,doc,docx,pdf]',
        'errors' => [
          'max_size' => 'Ukuran File Lampiran Terlalu Besar. Maksimal 10MB',
          'ext_in' => 'Mohon Pilih File Berekstensi .DOC/.DOCX/.PDF',
        ]
      ],
    ])){

      // $validation = \Config\Services::validation();
      return redirect()->back()->withInput();
    }

    $fileLampiran = $this->request->getFile('lampiran');
    // cek Gambar, Apakah Update atau Tidak
    if($fileLampiran->getError() == 4){
      $namaLampiran = $this->request->getVar('lampiranLama');
    }
    else{
      //Pindahkan Ke Folder img
      $fileLampiran->move('img/lampiran/surat_masuk');

      $namaLampiran = $fileLampiran->getName();

      unlink('img/lampiran/surat_masuk/' . $this->request->getVar('lampiranLama'));
    }

    $this->smModel->save([
      'id_sm' => $id,
      'nomor_surat' => $this->request->getVar('nomor_surat'),
      'tanggal_surat' => $this->request->getVar('tanggal_surat'),
      'tanggal_terima' => $this->request->getVar('tanggal_terima'),
      'nomor_agenda' => $this->request->getVar('nomor_agenda'),
      'sifat_surat' => $this->request->getVar('sifat_surat'),
      'pengirim' => $this->request->getVar('pengirim'),
      'perihal' => $this->request->getVar('perihal'),
      'id_bagian' => $this->request->getVar('id_bagian'),
      'isi_disposisi' => $this->request->getVar('isi_disposisi'),
      'lampiran' => $namaLampiran
    ]);
    
    session()->setFlashdata('msg', 'Data Berhasil Diubah');
    return redirect()->to('/sm');
  }

  public function download($id)
  {
		$download = $this->smModel->find($id);
		return $this->response->download('img/lampiran/surat_masuk/' . $download['lampiran'], null);
  }

  public function delete($id)
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $sm = $this->smModel->find($id);
    unlink('img/lampiran/surat_masuk/'. $sm['lampiran']);

    $this->smModel->delete($id);
    session()->setFlashdata('msg', 'Data Berhasil Dihapus');
    return redirect()->to('/sm');
  }
}
