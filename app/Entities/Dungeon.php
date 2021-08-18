<?php

namespace App\Entities;

use CodeIgniter\Entity;

/**
 * Class Dungeon
 *
 * This class represents a single row in the
 * `dungeons` database.
 *
 * @package App\Entities
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
        'capacity' => 'integer',
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
}
