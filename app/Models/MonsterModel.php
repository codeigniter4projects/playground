<?php

namespace App\Models;

use CodeIgniter\Model;

class MonsterModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'monsters';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string
     */
    protected $returnType = 'App\Entities\Monster';

    protected $useTimestamps  = true;
    protected $useSoftDeletes = true;
    protected $skipValidation = false;

    protected $allowedFields   = ['name', 'health', 'dungeon_id'];
    protected $validationRules = [
        'name'       => 'required|min_length[2]',
        'health'     => 'is_natural',
        'dungeon_id' => 'is_natural_no_zero',
    ];
    protected $validationMessages = [];
}
