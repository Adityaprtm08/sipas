<?php 

namespace App\Models;

use CodeIgniter\Model;

class SkModel extends Model
{
  protected $table = 'tbl_sk';
  protected $primaryKey = 'id_sk';
  protected $useTimestamps = true;
  protected $createdField  = 'skcreated_at';
  protected $updatedField  = 'skupdated_at';

  protected $allowedFields = [
    'nomor_surat','tanggal_surat','tanggal_kirim','nomor_agenda','sifat_surat','penerima','perihal','lampiran','id_bagian',
  ];

  public function getSk($id = null)
  {
    if($id == null){
      $builder = $this->db->table('tbl_sk');
      $builder->select('id_sk, nomor_surat, tanggal_surat, tanggal_kirim, nomor_agenda, sifat_surat, penerima, perihal, lampiran, tbl_sk.id_bagian, tbl_bagian.nama_bagian, skcreated_at, skupdated_at');
      $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_sk.id_bagian','left');
      $builder->orderBy('id_sk','DESC');
      $query = $builder->get();
      return $query->getResultArray();
    } 
    else {
      $builder = $this->db->table('tbl_sk');
      $builder->select('id_sk, nomor_surat, tanggal_surat, tanggal_kirim, nomor_agenda, sifat_surat, penerima, perihal, lampiran, tbl_sk.id_bagian, tbl_bagian.nama_bagian, skcreated_at, skupdated_at');
      $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_sk.id_bagian','left');
      $builder->where('id_sk', $id);
      $builder->orderBy('id_sk','DESC');
      $query = $builder->get();
      return $query->getRowArray();
    }   
  }
  
  public function getSkByIdBagian($id_bagian = null)
  {
    if($id_bagian == null){
      $builder = $this->db->table('tbl_sk');
      $builder->select('id_sk, nomor_surat, tanggal_surat, tanggal_kirim, nomor_agenda, sifat_surat, penerima, perihal, lampiran, tbl_sk.id_bagian, tbl_bagian.nama_bagian, skcreated_at, skupdated_at');
      $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_sk.id_bagian','left');
      $builder->orderBy('id_sk','DESC');
      $query = $builder->get();
      return $query->getResultArray();
    }
    else
    {
      $builder = $this->db->table('tbl_sk');
      $builder->select('id_sk, nomor_surat, tanggal_surat, tanggal_kirim, nomor_agenda, sifat_surat, penerima, perihal, lampiran, tbl_sk.id_bagian, tbl_bagian.nama_bagian, skcreated_at, skupdated_at');
      $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_sk.id_bagian','left');
      $builder->where('tbl_sk.id_bagian', $id_bagian);
      $builder->orderBy('id_sk','DESC');
      $query = $builder->get();
      return $query->getResultArray();
    }
  }

  public function getCountSk()
  {
    return $this->db->table('tbl_sk')->countAll();
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

  public function getDataByDate($tanggalawal, $tanggalakhir)
  {
    $builder = $this->db->table('tbl_sk');
    $builder->select('id_sk, nomor_surat, tanggal_surat, tanggal_kirim, nomor_agenda, sifat_surat, penerima, perihal, lampiran, tbl_sk.id_bagian, tbl_bagian.nama_bagian, skcreated_at, skupdated_at');
    $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_sk.id_bagian','left');
    $builder->where('DATE(tbl_sk.tanggal_kirim) >=', date('Y-m-d',strtotime($tanggalawal)));
    $builder->where('DATE(tbl_sk.tanggal_kirim) <=', date('Y-m-d',strtotime($tanggalakhir)));
    $builder->orderBy('id_sk','DESC');
    $query = $builder->get();
    return $query->getResultArray();
  }
}