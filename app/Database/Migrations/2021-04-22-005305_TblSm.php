<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSm extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_sm'              => [
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
			'tanggal_terima'     => [
				'type'             => 'DATE',
				'null'             => true,
			],
			'nomor_agenda'       => [
				'type'             => 'VARCHAR',
				'constraint'       => '20',
				'null'						 => true
			],
			'sifat_surat'        => [
				'type'             => 'VARCHAR',
				'constraint'       => '100',
				'null'						 => true
			],
			'pengirim'              => [
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
			'isi_disposisi'           => [
				'type'             => 'VARCHAR',
				'constraint'       => '255',
				'null'						 => true
			],
			'id_bagian'          => [
				'type'             => 'INT',
				'constraint'       => 10,
				'null'						 => true
			],
			'smcreated_at'		     => [
				'type'						   => 'DATETIME',
				'null'						   => true
			],
			'smupdated_at'		     => [
				'type'						   => 'DATETIME',
				'null'						   => true
			],
		]);
					
		$this->forge->addKey('id_sm', true);
		$this->forge->createTable('tbl_sm');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_sm');
	}
}
