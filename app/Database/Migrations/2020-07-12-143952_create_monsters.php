<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMonsters extends Migration
{
	public function up(): void
	{
		// We aren't actually going to use foreign keys (see below) but it is a good idea to toggle them in your seeder.
		$this->db->disableForeignKeyChecks();

		/**
		 * Monsters
		 *
		 * Notice the `dungeon_id` field, a reference back to our `dungeons` table. This
		 * implies that each monster "belongs to" a single dungeon, especially since it
		 * cannot be null.
		 */
		$fields = [
			'name'       => ['type' => 'varchar', 'constraint' => 255],
			'health'     => ['type' => 'int', 'null' => true],
			'dungeon_id' => ['type' => 'int'],
			'created_at' => ['type' => 'datetime', 'null' => true],
			'updated_at' => ['type' => 'datetime', 'null' => true],
			'deleted_at' => ['type' => 'datetime', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addKey('name');
		$this->forge->addKey('created_at');
		
		$this->forge->createTable('monsters');

		/**
		 * Abilities
		 *
		 * Abilities may be "cast" by anything that has the ability. Below we will make
		 * a separate table to define who "has" an ability, since different monsters
		 * can have the same ability (or heroes, for that matter).
		 */
		$fields = [
			'name'       => ['type' => 'varchar', 'constraint' => 255],
			'damage'     => ['type' => 'int', 'null' => true],
			'cooldown'   => ['type' => 'int', 'null' => true],
			'created_at' => ['type' => 'datetime', 'null' => true],
			'updated_at' => ['type' => 'datetime', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		$this->forge->addUniqueKey('name');
		$this->forge->addKey('created_at');
		
		$this->forge->createTable('abilities');
		
		/**
		 * Abilities - Monsters
		 *
		 * Because we want monsters to have more than one ability, and many monsters to
		 * have the same ability, we need a "join table" to define these "many to many"
		 * relationships.
		 */
		$fields = [
			'ability_id' => ['type' => 'int'],
			'monster_id' => ['type' => 'int'],
			'created_at' => ['type' => 'datetime', 'null' => true],
		];
		
		$this->forge->addField('id');
		$this->forge->addField($fields);

		// Note that the keys are defined as "unique" so the same monster cannot have the same ability twice
		$this->forge->addUniqueKey(['ability_id', 'monster_id']);
		$this->forge->addUniqueKey(['monster_id', 'ability_id']);

		/**
		 * Foreign keys help track items related to each other across databse tables.
		 * Normally it would be a good idea to define foreign keys on our join table back
		 * to the actual monster and ability they reference. However foreign keys can make
		 * it harder to work with databases, so we will leave them off for now. Feel free
		 * to uncomment them if you want to play:
		 */
		//$this->forge->addForeignKey('ability_id', 'abilities', 'id', false, 'CASCADE');
		//$this->forge->addForeignKey('monster_id', 'monsters', 'id', false, 'CASCADE');
		
		$this->forge->createTable('abilities_monsters');

		$this->db->enableForeignKeyChecks();
	}

	public function down(): void
	{
		$this->db->disableForeignKeyChecks();

		$this->forge->dropTable('monsters');
		$this->forge->dropTable('abilities');
		$this->forge->dropTable('abilities_monsters');

		$this->db->enableForeignKeyChecks();
	}
}
