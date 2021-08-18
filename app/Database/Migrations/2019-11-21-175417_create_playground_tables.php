<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePlaygroundTables extends Migration
{
	/**
	 * Database creation is both an art and a science: there are many best practices,
	 * but there are also aspects that are left up to develop opinions. This migration
	 * file offers a few different philosophies to table definitions - follow the
	 * format that fits your style.
	 *
	 */
	public function up(): void
	{
		/**
		 * Heroes
		 *
		 * We include all three data fields (created_at, updated_at, deleted_at) so we
		 * can use both features of CodeIgniter\Model, $useTimestamps and $useSoftDeletes.
		 */
		$fields = [
			'name'       => ['type' => 'varchar', 'constraint' => 255],
			'class'      => ['type' => 'varchar', 'constraint' => 63],
			'level'      => ['type' => 'int', 'null' => true],
			'image'      => ['type' => 'varchar', 'constraint' => 255],
			'pronoun'    => ['type' => 'varchar', 'constraint' => 15],
			'created_at' => ['type' => 'datetime', 'null' => true],
			'updated_at' => ['type' => 'datetime', 'null' => true],
			'deleted_at' => ['type' => 'datetime', 'null' => true],
		];
		
		// 'id' is a buzzword that indicates to addField() that this will be a primary key
		// We could also have provided this in $fields, as we do below
		$this->forge->addField('id');
		$this->forge->addField($fields);

		// Keys help optimize database performance; we'll add some for fields we are likely
		// to search or filter by
		$this->forge->addKey('name');
		$this->forge->addKey('created_at');
		
		// While not necessary, indexing against `deleted_at` is a good idea if your model
		// is using soft deletes, since most SELECT statements will include `deleted_at`
		$this->forge->addKey(['deleted_at', 'id']);
		
		$this->forge->createTable('heroes');
		
		/**
		 * Dungeons
		 *
		 * This time we define the primary key explicitly. Also notice that our dungeons
		 * do not have a `deleted_at` field, so won't be using model soft deletes.
		 */
		$fields = [
			'id'         => ['type' => 'int', 'constraint' => 9, 'auto_increment' => true],
			'name'       => ['type' => 'varchar', 'constraint' => 255],
			'difficulty' => ['type' => 'int', 'default' => 10],
			'capacity'   => ['type' => 'int', 'null' => true],
			'created_at' => ['type' => 'datetime', 'null' => true],
			'updated_at' => ['type' => 'datetime', 'null' => true],
		];
		
		$this->forge->addField($fields);

		// This tells the database to use `id` as the primary key
		$this->forge->addKey('id', true);

		$this->forge->addKey('name');
		$this->forge->addKey('created_at');
		
		$this->forge->createTable('dungeons');
	}

	public function down(): void
	{
		$this->forge->dropTable('heroes');
		$this->forge->dropTable('dungeons');
	}
}
