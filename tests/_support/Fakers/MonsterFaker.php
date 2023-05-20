<?php

namespace Tests\Support\Fakers;

use App\Entities\Monster;
use App\Models\MonsterModel;
use CodeIgniter\Test\Fabricator;
use CodeIgniter\Test\Interfaces\FabricatorModel;
use Faker\Generator;

/**
 * Fabricator is a part of the framework's core test utilities. It allows
 * developers to generate random data with predefined formats for testing.
 * By extending our Model and adding the `fake()` method we are telling
 * Fabricator that it can use this extension to generate rows for `monsters`.
 */
class MonsterFaker extends MonsterModel implements FabricatorModel
{
    /**
     * Faked data for Fabricator.
     */
    public function fake(Generator &$faker): Monster
    {
        return new Monster([
            'name'   => $faker->lastName(),
            'health' => mt_rand(1, 50),

            /**
             * This is a special function of Fabricator that means "get how many items
             * have been generated for this table so far". It is handy for faking
             * related items, like the number of possible dungeons. But if none have
             * been made we will just pick a number.
             */
            'dungeon_id' => mt_rand(1, Fabricator::getCount('dungeons') ?: 3),
        ]);
    }
}
