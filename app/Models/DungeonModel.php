<?php

namespace App\Models;

use App\Entities\Dungeon;
use CodeIgniter\Model;

class DungeonModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'dungeons';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    // We are specifying an Entity class to return
    // here instead of a simple array or object.
    // You don't have to extend CI's Entity class, though,
    // any class can be used.
    /**
     * @var string
     */
    protected $returnType = Dungeon::class;

    /**
     * @var bool
     */
    protected $useSoftDeletes = false;

    /**
     * @var string[]
     */
    protected $allowedFields = ['name', 'difficulty', 'capacity'];

    /**
     * @var bool
     */
    protected $useTimestamps = true;

    /**
     * @var array<string, string>
     */
    protected $validationRules = [
        'name'       => 'required|min_length[2]',
        'difficulty' => 'is_natural_no_zero',
        'capacity'   => 'is_natural_no_zero',
    ];

    /**
     * @var mixed[]
     */
    protected $validationMessages = [];

    /**
     * @var bool
     */
    protected $skipValidation = false;

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
