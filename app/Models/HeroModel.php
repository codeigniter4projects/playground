<?php namespace App\Models;

use CodeIgniter\Model;

class HeroModel extends Model
{
	protected $table      = 'heroes';
	protected $primaryKey = 'id';

	protected $returnType = 'object';
	protected $useSoftDeletes = true;

	protected $allowedFields = ['name', 'class', 'level', 'pronoun', 'image'];

	protected $useTimestamps = true;

	protected $validationRules    = [
		'name'  => 'required|min_length[2]',
		'level' => 'is_natural_no_zero',
	];
	protected $validationMessages = [];
	protected $skipValidation     = false;
}
