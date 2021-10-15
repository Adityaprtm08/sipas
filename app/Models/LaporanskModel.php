<?php 

namespace App\Models;

use CodeIgniter\Model;

class LaporanskModel extends Model
{
  protected $table = 'tbl_sk';
  protected $primaryKey = 'id_sk';
  protected $useTimestamps = true;
  protected $createdField  = 'skcreated_at';
  protected $updatedField  = 'skupdated_at';

  protected $allowedFields = [
    'nomor_surat','tanggal_surat','tanggal_kirim','sifat_surat','penerima','perihal','lampiran','dibaca','id_bagian'
  ];

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