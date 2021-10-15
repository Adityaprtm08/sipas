<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblBagian extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_bagian'          => [
				'type'             => 'INT',
				'constraint'       => 10,
				'unsigned'         => true,
				'auto_increment'   => true,
			],
			'nama_bagian'        => [
				'type'             => 'VARCHAR',
				'constraint'       => '100',
			],
			'bagiancreated_at'		     => [
				'type'						 			 => 'DATETIME',
				'null'						 			 => true
			],
			'bagianupdated_at'		     => [
				'type'						 			 => 'DATETIME',
				'null'						 			 => true
			],
		]);
					
		$this->forge->addKey('id_bagian', true);
		$this->forge->createTable('tbl_bagian');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_bagian');
	}
}
