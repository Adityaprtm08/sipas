<?php 

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model{
    protected $table = 'tbl_user';
    protected $primarykey = 'id_user';

    protected $allowedFields = [
      'username','password','nama_lengkap','level','bagian','alamat','telepon','foto_profil'
    ];
}