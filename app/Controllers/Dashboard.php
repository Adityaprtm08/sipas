<?php

namespace App\Controllers;

use App\Models\BagianModel;

use App\Models\PenggunaModel;

use App\Models\SmModel;

use App\Models\SkModel;


class Dashboard extends BaseController
{
  protected $BagianModel;
  protected $PenggunaModel;
  protected $SmModel;
  protected $SkModel;

  public function __construct()
  {
    $this->BagianModel    = new BagianModel();
    $this->PenggunaModel  = new PenggunaModel();
    $this->SmModel        = new SmModel();
    $this->SkModel        = new SkModel();
  }

  public function index()
	{

		$data = [
			"title"              => "Dashboard | SIPAS Kantor Pemerintah Desa Kalisalak",
      "totalsm"            => $this->SmModel->getCountSm(),
      "totalsk"            => $this->SkModel->getCountSk(),
      "totalbagian"        => $this->BagianModel->getCountBagian(),
      "totalpengguna"      => $this->PenggunaModel->getCountPengguna(),
      "totaladmin"         => $this->PenggunaModel->getCountAdmin(),
      "totaluser"          => $this->PenggunaModel->getCountUser(),
      "smjan"              => $this->SmModel->getCountSmJan(),
      "smfeb"              => $this->SmModel->getCountSmFeb(),
      "smmar"              => $this->SmModel->getCountSmMar(),
      "smapr"              => $this->SmModel->getCountSmApr(),
      "smmei"              => $this->SmModel->getCountSmMei(),
      "smjun"              => $this->SmModel->getCountSmJun(),
      "smjul"              => $this->SmModel->getCountSmJul(),
      "smagu"              => $this->SmModel->getCountSmAgu(),
      "smsep"              => $this->SmModel->getCountSmSep(),
      "smokt"              => $this->SmModel->getCountSmOkt(),
      "smnov"              => $this->SmModel->getCountSmNov(),
      "smdes"              => $this->SmModel->getCountSmDes(),
      "skjan"              => $this->SkModel->getCountSkJan(),
      "skfeb"              => $this->SkModel->getCountSkFeb(),
      "skmar"              => $this->SkModel->getCountSkMar(),
      "skapr"              => $this->SkModel->getCountSkApr(),
      "skmei"              => $this->SkModel->getCountSkMei(),
      "skjun"              => $this->SkModel->getCountSkJun(),
      "skjul"              => $this->SkModel->getCountSkJul(),
      "skagu"              => $this->SkModel->getCountSkAgu(),
      "sksep"              => $this->SkModel->getCountSkSep(),
      "skokt"              => $this->SkModel->getCountSkOkt(),
      "sknov"              => $this->SkModel->getCountSkNov(),
      "skdes"              => $this->SkModel->getCountSkDes(),
		];  

		return view("Users/Dashboard/v_dashboard", $data);
	}
}
