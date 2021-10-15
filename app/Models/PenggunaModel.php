<?php 

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
  protected $table = 'tbl_user';
  protected $primaryKey = 'id_user';
  protected $useTimestamps = true;
  protected $createdField  = 'usercreated_at';
  protected $updatedField  = 'userupdated_at';

  protected $allowedFields = [
    'username','password','nama_lengkap','email','level','alamat','telepon','foto_profil','id_bagian'
  ];

  public function getPengguna($id = null)
  {
    if($id == null){
      $builder = $this->db->table('tbl_user');
      $builder->select('id_user, username, password, nama_lengkap, email, level, alamat, telepon, foto_profil, tbl_user.id_bagian, tbl_bagian.nama_bagian, usercreated_at, userupdated_at');
      $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_user.id_bagian', 'left');
      $builder->orderBy('id_user','DESC');
      $query = $builder->get();
      return $query->getResultArray();
    } 
    else {
      $builder = $this->db->table('tbl_user');
      $builder->select('id_user, username, password, nama_lengkap, email, level, alamat, telepon, foto_profil, tbl_user.id_bagian, tbl_bagian.nama_bagian, usercreated_at, userupdated_at');
      $builder->join('tbl_bagian','tbl_bagian.id_bagian=tbl_user.id_bagian', 'left');
      $builder->where('id_user', $id);
      $query = $builder->get();
      return $query->getRowArray();
    }   
  }

  public function getUserData($id)
  {
      return $this->where(['id_user' => $id])->find();
  }

  public function getCountPengguna()
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

}