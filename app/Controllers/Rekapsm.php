<?php

namespace App\Controllers;

use App\Models\SmModel;

class Rekapsm extends BaseController
{
	protected $SmModel;

	public function __construct()
	{
		$this->SmModel = new SmModel();
	}

  public function index()
  {
		if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
		$data = [
			'title'	=> 'Rekapitulasi Surat Masuk | SIPAS Kantor Pemerintah Desa Kalisalak',
		];

		return view('Users/Rekapitulasi/v_rekap_sm', $data);
  }

  public function data_sm()
	{
		if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
		$tanggalawal 	= $this->request->getPost('tanggalawal');
		$tanggalakhir = $this->request->getPost('tanggalakhir');

		$data = [
			'title'	=> 'Data Rekapitulasi Surat Keluar | SIPAS Kantor Pemerintah Desa Kalisalak',
			'datasm' => $this->SmModel->getDataByDate($tanggalawal, $tanggalakhir),
			'tglawal' => $tanggalawal,
			'tglakhir' => $tanggalakhir
		];

		return view('Users/Rekapitulasi/v_data_sm', $data);
	}

  public function cetak_pdf()
	{
		if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
		$tanggalawal = $this->request->getPost('tglawal');
		$tanggalakhir = $this->request->getPost('tglakhir');

		$data = [
			'datasm' => $this->SmModel->getDataByDate($tanggalawal, $tanggalakhir),
			'tglawal' => $tanggalawal,
			'tglakhir' => $tanggalakhir
		];

		return view('Users/Rekapitulasi/v_sm_pdf', $data);
		
	}
}