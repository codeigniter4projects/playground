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

    /**
     * @var bool
     */
    protected $useTimestamps  = true;
    /**
     * @var bool
     */
    protected $useSoftDeletes = false;
    /**
     * @var bool
     */
    protected $skipValidation = false;

    /**
     * @var string[]
     */
    protected $allowedFields   = ['name', 'damage', 'cooldown'];
    /**
     * @var array<string, string>
     */
    protected $validationRules = [
        'name'     => 'required|min_length[2]',
        'damage'   => 'is_natural',
        'cooldown' => 'is_natural',
    ];
}
