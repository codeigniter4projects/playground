<?php

namespace App\Entities;

use App\Models\MonsterModel;
use CodeIgniter\Entity\Entity;

/**
 * Class Dungeon
 *
 * This class represents a single row in the
 * `dungeons` database.
 */
class Dungeon extends Entity
{
    // Specifies that we should cast the columns
    // into a certain datatype when accessed.
    // In this case we want integers (not strings)
    // for difficulty and capacity. This allows
    // for strict type checking if needed.
    /**
     * @var array<string, string>
     */
    protected $casts = [
        'difficulty' => 'integer',
        'capacity'   => 'integer',
    ];

    /**
     * Entities are the perfect place for
     * convenience methods made to describe
     * a single instance.
     */
    public function link(): string
    {
        return site_url("dungeons/{$this->attributes['id']}");
    }

    /**
     * Use another model to get some random data.
     */
    public function monsters(int $limit=5)
    {
        return model(MonsterModel::class)
            ->where('dungeon_id', $this->id)
            ->orderBy('health', 'asc')
            ->findAll();
    }
}
