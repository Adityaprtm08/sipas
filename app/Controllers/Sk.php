<?php

namespace App\Controllers;

use App\Models\SkModel;

use App\Models\BagianModel;

use App\Libraries\Fungsi;

class Sk extends BaseController
{
	protected $skModel;
	protected $bagianModel;

	public function __construct()
  {
    $this->skModel = new SkModel();
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
      $sk = $this->skModel->getSk();
    }
    else{
      $sk = $this->skModel->getSkByIdBagian($id_bagian);
    }

		$data = [
			'title'				=> 'Surat Keluar | SIPAS Kantor Pemerintah Desa Kalisalak',
			'suratkeluar' => $sk
		];

		return view('Users/Pengarsipan/v_sk', $data);
	}

	public function create()
	{
		if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $data = [
      'title' => 'Tambah Surat Keluar | SIPAS Kantor Pemerintah Desa Kalisalak',
			'validation' => \Config\Services::validation(),
      'bagian' => $this->bagianModel->getBagian()
    ];

      return view('Users/Pengarsipan/v_tambah_sk', $data);
  }

	public function save()
  {
    if(!$this->validate([
      'nomor_surat' => [
        'rules' => 'required|is_unique[tbl_sk.nomor_surat]',
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
      'tanggal_kirim' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Kirim Surat Wajib Diisi.',
        ]
      ],
      'sifat_surat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Sifat Surat Wajib Diisi.',
        ]
      ],
      'id_bagian' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Pengirim Wajib Diisi.',
        ]
      ],
      'penerima' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Penerima Wajib Diisi.',
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

      return redirect()->to('/sk/create')->withInput();
    }

    //Ambil File Foto
    $fileLampiran = $this->request->getFile('lampiran');

    //Pindahkan Ke Folder img
    $fileLampiran->move('img/lampiran/surat_keluar');

		$namaLampiran = $fileLampiran->getName();

    $this->skModel->save([
      'nomor_surat' => getVariabel('nomor_surat'),
      'tanggal_surat' => getVariabel('tanggal_surat'),
      'tanggal_kirim' => getVariabel('tanggal_kirim'),
      'nomor_agenda' => getVariabel('nomor_agenda'),
      'sifat_surat' => getVariabel('sifat_surat'),
      'id_bagian' => getVariabel('id_bagian'),
      'penerima' => getVariabel('penerima'),
      'perihal' => getVariabel('perihal'),
      'lampiran' => $namaLampiran
    ]);
    
    session()->setFlashdata('msg', 'Data Berhasil Ditambahkan');
    return redirect()->to('/sk');
  }

  public function detail($id)
	{
		$data = [
			'title'				=> 'Surat Keluar | SIPAS Kantor Pemerintah Desa Kalisalak',
			'suratkeluar' => $this->skModel->getSk($id)
		];

		return view('Users/Pengarsipan/v_detail_sk', $data);
	}

  public function edit($id)
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $data = [
      'title'       => 'Edit Surat Keluar | SIPAS Kantor Pemerintah Desa Kalisalak',
			'validation'  => \Config\Services::validation(),
      'suratkeluar' => $this->skModel->getSk($id),
      'bagian'      => $this->bagianModel->getBagian()
    ];

    return view("Users/Pengarsipan/v_edit_sk", $data);
  }

  public function update($id)
  {
    $skLama = $this->skModel->getSk($id);
    if($skLama['nomor_surat'] == $this->request->getVar('nomor_surat')){
      $rule_nomor_surat = 'required';
    }
    else{
      $rule_nomor_surat ='required|is_unique[tbl_sk.nomor_surat]';
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
      'nomor_agenda' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomor Agenda Wajib Diisi.',
        ]
      ],
      'tanggal_kirim' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal Kirim Surat Wajib Diisi.',
        ]
      ],
      'sifat_surat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Sifat Surat Wajib Diisi.',
        ]
      ],
      'id_bagian' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Pengirim Wajib Diisi.',
        ]
      ],
      'penerima' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Penerima Wajib Diisi.',
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
      $fileLampiran->move('img/lampiran/surat_keluar');

      $namaLampiran = $fileLampiran->getName();

      unlink('img/lampiran/surat_keluar/' . $this->request->getVar('lampiranLama'));
    }

    $this->skModel->save([
      'id_sk' => $id,
      'nomor_surat' => $this->request->getVar('nomor_surat'),
      'tanggal_surat' => $this->request->getVar('tanggal_surat'),
      'tanggal_kirim' => $this->request->getVar('tanggal_kirim'),
      'nomor_agenda' => $this->request->getVar('nomor_agenda'),
      'sifat_surat' => $this->request->getVar('sifat_surat'),
      'id_bagian' => $this->request->getVar('id_bagian'),
      'penerima' => $this->request->getVar('penerima'),
      'perihal' => $this->request->getVar('perihal'),
      'lampiran' => $namaLampiran
    ]);
    
    session()->setFlashdata('msg', 'Data Berhasil Diubah');
    return redirect()->to('/sk');
  }

  public function download($id)
  {
		$download = $this->skModel->find($id);
		return $this->response->download('img/lampiran/surat_keluar/' . $download['lampiran'], null);
  }

  public function delete($id)
  {
    if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
    $sk = $this->skModel->find($id);
    unlink('img/lampiran/surat_keluar/'. $sk['lampiran']);

    $this->skModel->delete($id);
    session()->setFlashdata('msg', 'Data Berhasil Dihapus');
    return redirect()->to('/sk');
  }
}
