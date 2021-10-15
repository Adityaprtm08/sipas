<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_sk'          => [
				'type'             => 'INT',
				'constraint'       => 10,
				'unsigned'         => true,
				'auto_increment'   => true,
			],
			'nomor_surat'        => [
				'type'             => 'VARCHAR',
				'constraint'       => '20',
				'null'             => true,
			],
			'tanggal_surat'      => [
				'type'             => 'DATE',
				'null'             => true,
			],
			'tanggal_kirim'     => [
				'type'             => 'DATE',
				'null'             => true,
			],
			'nomor_agenda'        => [
				'type'             => 'VARCHAR',
				'constraint'       => '20',
				'null'						 => true
			],
			'sifat_surat'        => [
				'type'             => 'VARCHAR',
				'constraint'       => '100',
				'null'						 => true
			],
			'penerima'              => [
				'type'             => 'VARCHAR',
				'constraint'       => '100',
				'null'						 => true
			],
			'perihal'            => [
				'type'             => 'VARCHAR',
				'constraint'       => '255',
				'null'						 => true
			],
			'lampiran'           => [
				'type'             => 'VARCHAR',
				'constraint'       => '255',
				'null'						 => true
			],
			'id_bagian'          => [
				'type'             => 'INT',
				'constraint'       => 10,
				'null'						 => true
			],
			'skcreated_at'		     => [
				'type'						   => 'DATETIME',
				'null'						   => true
			],
			'skupdated_at'		     => [
				'type'						   => 'DATETIME',
				'null'						   => true
			],
		]);
					
		$this->forge->addKey('id_sk', true);
		$this->forge->createTable('tbl_sk');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_sk');
	}
}
