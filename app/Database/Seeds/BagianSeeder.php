<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class BagianSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $data = [
      [
        'nama_bagian'        => 'Kepala Desa',
        'bagiancreated_at'   => Time::now(),
        'bagianupdated_at'   => Time::now(),
      ],
      [
        'nama_bagian'        => 'Sekretaris Desa',
        'bagiancreated_at'   => Time::now(),
        'bagianupdated_at'   => Time::now(),
      ],
      [
        'nama_bagian'        => 'Kaur TU dan Umum',
        'bagiancreated_at'   => Time::now(),
        'bagianupdated_at'   => Time::now(),
      ],
      [
        'nama_bagian'        => 'Kaur Keuangan',
        'bagiancreated_at'   => Time::now(),
        'bagianupdated_at'   => Time::now(),
      ],
      [
        'nama_bagian'        => 'Kaur Perencanaan',
        'bagiancreated_at'   => Time::now(),
        'bagianupdated_at'   => Time::now(),
      ],
      [
        'nama_bagian'        => 'Kasi Kesejahteraan',
        'bagiancreated_at'   => Time::now(),
        'bagianupdated_at'   => Time::now(),
      ],
      [
        'nama_bagian'        => 'Kasi Pemerintahan',
        'bagiancreated_at'   => Time::now(),
        'bagianupdated_at'   => Time::now(),
      ],
      [
        'nama_bagian'        => 'Kasi Pelayanan',
        'bagiancreated_at'   => Time::now(),
        'bagianupdated_at'   => Time::now(),
      ],
      [
        'nama_bagian'        => 'Kepala Dusun',
        'bagiancreated_at'   => Time::now(),
        'bagianupdated_at'   => Time::now(),
      ],
    ];

      // Using Query Builder
      $this->db->table('tbl_bagian')->insertBatch($data);
  }
}