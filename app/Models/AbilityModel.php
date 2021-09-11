<?php

namespace App\Models;

use CodeIgniter\Model;

class AbilityModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'abilities';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string
     */
    protected $returnType = 'object';

    protected $useTimestamps  = true;
    protected $useSoftDeletes = false;
    protected $skipValidation = false;

    protected $allowedFields   = ['name', 'damage', 'cooldown'];
    protected $validationRules = [
        'name'     => 'required|min_length[2]',
        'damage'   => 'is_natural',
        'cooldown' => 'is_natural',
    ];
}
