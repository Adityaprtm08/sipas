<?php 

namespace App\Models;

use CodeIgniter\Model;

class LaporansmModel extends Model
{
  protected $table = 'tbl_sm';
  protected $primaryKey = 'id_sm';
  protected $useTimestamps = true;
  protected $createdField  = 'smcreated_at';
  protected $updatedField  = 'smupdated_at';

  protected $allowedFields = [
    'nomor_surat','tanggal_surat','tanggal_terima','sifat_surat','pengirim','perihal','lampiran','id_bagian','isi_disposisi'
  ];

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