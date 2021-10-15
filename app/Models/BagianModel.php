<?php 

namespace App\Models;

use CodeIgniter\Model;

class BagianModel extends Model
{
  protected $table = 'tbl_bagian';
  protected $primaryKey = 'id_bagian';

  protected $useTimestamps = true;
  protected $createdField  = 'bagiancreated_at';
  protected $updatedField  = 'bagianupdated_at';

  protected $allowedFields = [
    'nama_bagian'
  ];

  public function getBagian($id = null)
  {
      if($id == null){
        $builder = $this->db->table('tbl_bagian');
        $builder->select('*');
        $builder->orderBy('id_bagian','DESC');
        $query = $builder->get();
        return $query->getResultArray();
      }
      else {
        $builder = $this->db->table('tbl_bagian');
        $builder->select('*');
        $builder->where('id_bagian', $id);
        $query = $builder->get();
        return $query->getRowArray();
      }  
  }

  public function getCountBagian()
  {
    return $this->db->table('tbl_bagian')->countAll();
  }
}