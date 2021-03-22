<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user_email'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'user_name'       	 => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'user_password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'user_alamat'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'user_nik'        => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'level'        => [
				'type'       => 'INT',
				'constraint' => '5',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
