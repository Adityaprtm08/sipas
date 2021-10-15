<?php

namespace App\Libraries;

use App\Models\AuthModel;
use App\Models\PenggunaModel;
use App\Models\BagianModel;

class Fungsi
{
  public function getUserData($id)
  {
    $this->PenggunaModel = new PenggunaModel();
    return $this->PenggunaModel->getUserData($id);
  }
}