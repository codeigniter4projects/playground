<?php

use App\Entities\Dungeon;
use App\Entities\Monster;
use App\Models\DungeonModel;
use CodeIgniter\Test\Fabricator;
use Tests\Support\DatabaseTestCase;
use Tests\Support\Fakers\MonsterFaker;

/**
 * We have already defined a special kind of Model in the _support/Fakers
 * folder that contains the `fake()` method. This test shows off some
 * of the ways you might use CodeIgniter's Fabricator to create and test
 * different scenarios.
 *
 * @internal
 */
final class FakerTest extends DatabaseTestCase
{
    private Fabricator $fabricator;

    protected function setUp(): void
    {
        parent::setUp();

        // Get an instance of Fabricator ready to use our Faker
        $this->fabricator = new Fabricator(MonsterFaker::class);

        // Let Fabricator know about the dungeons we already created in PlaygroundSeeder
        Fabricator::setCount('dungeons', 3);
    }

    // Ensure that our Faker is returning a valid Monster
    public function testMakesValidMonster()
    {
        // We can use make() to generate a random dataset defined in our Faker
        $monster = $this->fabricator->make();

        $this->assertInstanceOf(Monster::class, $monster);
        $this->assertGreaterThanOrEqual(1, $monster->health);
    }

    // Since our Faker uses Fabricator counts for its dungeon_id we should always have a valid dungeon available
    public function testMakesMonsterWithDungeon()
    {
        /** @var Monster $monster */
        $monster = $this->fabricator->make();
        $dungeon = model(DungeonModel::class)->find($monster->dungeon_id);

        $this->assertInstanceOf(Dungeon::class, $dungeon);
    }

    public function testCreateAddsToDatabase()
    {
        // create() generates a random dataset just like make() but also adds it to the database for us
        $monster = $this->fabricator->create();
        $this->assertIsInt($monster->id);

        $this->seeInDatabase('monsters', ['id' => $monster->id]);
    }

    public function testHelperUsesFaker()
    {
        // test_helper comes with the fake() method that does the same as above without all the set up
        $monster = fake(MonsterFaker::class);
        $this->assertIsInt($monster->id);

        $this->seeInDatabase('monsters', ['id' => $monster->id]);
    }
}
