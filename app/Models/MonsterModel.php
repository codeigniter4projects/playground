<?php

namespace App\Models;

use App\Entities\Monster;
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
    protected $returnType = Monster::class;

    /**
     * @var bool
     */
    protected $useTimestamps = true;

    /**
     * @var bool
     */
    protected $useSoftDeletes = true;

    /**
     * @var bool
     */
    protected $skipValidation = false;

    /**
     * @var string[]
     */
    protected $allowedFields = ['name', 'health', 'dungeon_id'];

    /**
     * @var array<string, string>
     */
    protected $validationRules = [
        'name'       => 'required|min_length[2]',
        'health'     => 'is_natural',
        'dungeon_id' => 'is_natural_no_zero',
    ];

    /**
     * @var mixed[]
     */
    protected $validationMessages = [];
}
