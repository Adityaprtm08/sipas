<?php

namespace App\Controllers;

use App\Models\SkModel;

class Rekapsk extends BaseController
{
	protected $laporanskModel;

	public function __construct()
	{
		$this->SkModel = new SkModel();
	}

	public function index()
	{
		if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
		$data = [
			'title'	=> 'Rekapitulasi Surat Keluar | SIPAS Kantor Pemerintah Desa Kalisalak',
		];

		return view('Users/Rekapitulasi/v_rekap_sk', $data);
	}

	public function data_sk()
	{
		if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
		$tanggalawal 	= $this->request->getPost('tanggalawal');
		$tanggalakhir = $this->request->getPost('tanggalakhir');

		$data = [
			'title'	=> 'Data Rekapitulasi Surat Keluar | SIPAS Kantor Pemerintah Desa Kalisalak',
			'datask' => $this->SkModel->getDataByDate($tanggalawal, $tanggalakhir),
			'tglawal' => $tanggalawal,
			'tglakhir' => $tanggalakhir
		];

		return view('Users/Rekapitulasi/v_data_sk', $data);
	}

	public function cetak_pdf()
	{
		if (session()->get('level') != 'admin'){
      return redirect()->to('/dashboard');
    }
		$tanggalawal = $this->request->getPost('tglawal');
		$tanggalakhir = $this->request->getPost('tglakhir');

		$data = [
			'datask' => $this->SkModel->getDataByDate($tanggalawal, $tanggalakhir),
			'tglawal' => $tanggalawal,
			'tglakhir' => $tanggalakhir
		];

		return view('Users/Rekapitulasi/v_sk_pdf', $data);
		
	}
}
