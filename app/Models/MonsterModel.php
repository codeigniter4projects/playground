<?php namespace App\Models;

use CodeIgniter\Model;

class MonsterModel extends Model
{
	protected $table      = 'monsters';
	protected $primaryKey = 'id';

	protected $returnType = 'App\Entities\Monster';
	protected $useSoftDeletes = true;

	protected $allowedFields = ['name', 'health', 'dungeon_id'];

	protected $useTimestamps = true;

	protected $validationRules    = [
		'name'       => 'required|min_length[2]',
		'health'     => 'is_natural',
		'dungeon_id' => 'is_natural_no_zero',
	];
	protected $validationMessages = [];
	protected $skipValidation     = false;
}
