<?php namespace App\Models;

use CodeIgniter\Model;

class DungeonModel extends Model
{
	protected $table      = 'dungeons';
	protected $primaryKey = 'id';

	// We are specifying an Entity class to return
	// here instead of a simple array or object.
	// You don't have to extend CI's Entity class, though,
	// any class can be used.
	protected $returnType = 'App\Entities\Dungeon';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['name', 'difficulty', 'capacity'];

	protected $useTimestamps = true;

	protected $validationRules    = [
		'name'       => 'required|min_length[2]',
		'difficulty' => 'is_natural_no_zero',
		'capacity'   => 'is_natural_no_zero',
	];
	protected $validationMessages = [];
	protected $skipValidation     = false;

	/**
	 * Help! Dungeons have monsters in them, but we have no way of knowing
	 * which monsters are part of a dungeon. Can you write it?
	 *
	 * @param int $dungeonId
	 *
	 * @return array
	 */
	//public function getMonstersForDungeon(int $dungeonId): array
	//{
	//}
}
