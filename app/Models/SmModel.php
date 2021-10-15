<?php 

namespace App\Models;

use CodeIgniter\Model;

class SmModel extends Model
{
  protected $table = 'tbl_sm';
  protected $primaryKey = 'id_sm';
  protected $useTimestamps = true;
  protected $createdField  = 'smcreated_at';
  protected $updatedField  = 'smupdated_at';

  protected $allowedFields = [
    'nomor_surat','tanggal_surat', 'tanggal_terima','nomor_agenda','sifat_surat','pengirim','perihal','lampiran','id_bagian','isi_disposisi'
  ];

  public function getSm($id = null)
  {
    if($id == null){
      $builder = $this->db->table('tbl_sm');
      $builder->select('id_sm, nomor_surat, tanggal_surat, tanggal_terima, nomor_agenda, sifat_surat, pengirim, perihal, lampiran, tbl_sm.id_bagian, tbl_bagian.nama_bagian, isi_disposisi, smcreated_at, smupdated_at');
      $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_sm.id_bagian','left');
      $builder->orderBy('id_sm','DESC');
      $query = $builder->get();
      return $query->getResultArray();
    } 
    else {
      $builder = $this->db->table('tbl_sm');
      $builder->select('id_sm, nomor_surat, tanggal_surat, tanggal_terima, nomor_agenda, sifat_surat, pengirim, perihal, lampiran, tbl_sm.id_bagian, tbl_bagian.nama_bagian, isi_disposisi, smcreated_at, smupdated_at');
      $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_sm.id_bagian','left');
      $builder->where('id_sm', $id);
      $builder->orderBy('id_sm','DESC');
      $query = $builder->get();
      return $query->getRowArray();
    }   
  }

  public function getSmByIdBagian($id_bagian = null)
  {
    if($id_bagian == null){
      $builder = $this->db->table('tbl_sm');
      $builder->select('id_sm, nomor_surat, tanggal_surat, tanggal_terima, nomor_agenda, sifat_surat, pengirim, perihal, lampiran, tbl_sm.id_bagian, tbl_bagian.nama_bagian, isi_disposisi, smcreated_at, smupdated_at');
      $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_sm.id_bagian','left');
      $builder->orderBy('id_sm','DESC');
      $query = $builder->get();
      return $query->getResultArray();
    }
    else
    {
      $builder = $this->db->table('tbl_sm');
      $builder->select('id_sm, nomor_surat, tanggal_surat, tanggal_terima, nomor_agenda, sifat_surat, pengirim, perihal, lampiran, tbl_sm.id_bagian, tbl_bagian.nama_bagian, isi_disposisi, smcreated_at, smupdated_at');
      $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_sm.id_bagian','left');
      $builder->where('tbl_sm.id_bagian', $id_bagian);
      $builder->orderBy('id_sm','DESC');
      $query = $builder->get();
      return $query->getResultArray();
    }
  }

  public function getCountSm()
  {
    return $this->db->table('tbl_sm')->countAll();
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

  public function getDataByDate($tanggalawal, $tanggalakhir)
  {
    $builder = $this->db->table('tbl_sm');
    $builder->select('id_sm, nomor_surat, tanggal_surat, tanggal_terima, nomor_agenda, sifat_surat, pengirim, perihal, lampiran, tbl_sm.id_bagian, tbl_bagian.nama_bagian, isi_disposisi, smcreated_at, smupdated_at');
    $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_sm.id_bagian','left');
    $builder->where('DATE(tbl_sm.tanggal_terima) >=', date('Y-m-d',strtotime($tanggalawal)));
    $builder->where('DATE(tbl_sm.tanggal_terima) <=', date('Y-m-d',strtotime($tanggalakhir)));
    $builder->orderBy('id_sm','DESC');
    $query = $builder->get();
    return $query->getResultArray();
  } 

}