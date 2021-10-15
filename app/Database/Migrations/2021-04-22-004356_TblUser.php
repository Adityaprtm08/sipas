<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUser extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user'            => [
				'type'             => 'INT',
				'constraint'       => 10,
				'unsigned'         => true,
				'auto_increment'   => true,
			],
			'username'           => [
				'type'             => 'VARCHAR',
				'constraint'       => '50',
			],
			'password'           => [
				'type'             => 'VARCHAR',
				'constraint'       => '100',
			],
			'nama_lengkap'        => [
				'type'             => 'VARCHAR',
				'constraint'       => '100',
				'null'						 => true
			],
			'email'              => [
				'type'             => 'VARCHAR',
				'constraint'       => '100',
				'null'						 => true
			],
			'level'              => [
				'type'             => 'VARCHAR',
				'constraint'       => '25',
				'null'						 => true
			],
			'alamat'             => [
				'type'             => 'VARCHAR',
				'constraint'       => '255',
				'null'						 => true
			],
			'telepon'            => [
				'type'             => 'CHAR',
				'constraint'       => '12',
				'null'						 => true
			],
			'foto_profil'        => [
				'type'             => 'VARCHAR',
				'constraint'       => '255',
				'null'						 => true
			],
			'id_bagian'          => [
				'type'             => 'INT',
				'constraint'       => 10,
				'null'						 => true
			],
			'usercreated_at'		     => [
				'type'						     => 'DATETIME',
				'null'						     => true
			],
			'userupdated_at'		     => [
				'type'						     => 'DATETIME',
				'null'						     => true
			],
		]);
					
		$this->forge->addKey('id_user', true);
		$this->forge->createTable('tbl_user');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_user');
	}
}
