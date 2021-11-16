<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'heroes';
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string
     */
    protected $returnType     = 'object';
    /**
     * @var bool
     */
    protected $useSoftDeletes = true;

    /**
     * @var string[]
     */
    protected $allowedFields = ['name', 'class', 'level', 'pronoun', 'image'];

    /**
     * @var bool
     */
    protected $useTimestamps = true;

    /**
     * @var array<string, string>
     */
    protected $validationRules = [
        'name'  => 'required|min_length[2]',
        'level' => 'is_natural_no_zero',
    ];
    /**
     * @var mixed[]
     */
    protected $validationMessages = [];
    /**
     * @var bool
     */
    protected $skipValidation     = false;
}
