<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * Class Monster
 *
 * This class represents a single row in the
 * `monsters` database.
 */
class Monster extends Entity
{
    /**
     * @var array<string, string>
     */
    protected $casts = [
        'health'     => 'integer',
        'dungeon_id' => 'integer',
    ];

    /**
     * Help! Monsters each have their own set of abilities (see Database/Seeds) but
     * our entity has no way of knowing what those are. Can you write it?
     *
     * @return array
     */
    // public function getAbilities(): array
    // {
    // }
}
