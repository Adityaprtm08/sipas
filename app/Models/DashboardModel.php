<?php 

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{

  public function totalSm()
  {
    return $this->db->table('tbl_sm')->countAll();
  }

  public function totalSk()
  {
    return $this->db->table('tbl_sk')->countAll();
  }

  public function totalBagian()
  {
    return $this->db->table('tbl_bagian')->countAll();
  }

  public function totalPengguna()
  {
    return $this->db->table('tbl_user')->countAll();
  }

  public function getCountAdmin()
  {
    $builder = $this->db->table('tbl_user');
    $builder->select('*');
    $builder->where('level', 'admin');

    return $builder->countAllResults();
  }

  public function getCountUser()
  {
    $builder = $this->db->table('tbl_user');
    $builder->select('*');
    $builder->where('level', 'user');

    return $builder->countAllResults();
  }

  public function getCountSmJan()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '01');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmFeb()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '02');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmMar()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '03');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmApr()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '04');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmMei()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '05');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmJun()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '06');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmJul()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '07');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmAgu()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '08');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmSep()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '09');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmOkt()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '10');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmNov()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '11');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSmDes()
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('*');
    $builder->where('month(tanggal_terima)', '12');
    $builder->where('year(tanggal_terima)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkJan()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '01');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkFeb()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '02');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkMar()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '03');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkApr()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '04');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkMei()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '05');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkJun()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '06');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkJul()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '07');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkAgu()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '08');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkSep()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '09');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkOkt()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '10');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }
  public function getCountSkNov()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '11');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }

  public function getCountSkDes()
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('*');
    $builder->where('month(tanggal_kirim)', '12');
    $builder->where('year(tanggal_kirim)', '2021');

    return $builder->countAllResults();
  }
}
