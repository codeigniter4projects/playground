<?php

use App\Models\HeroModel;
use Tests\Support\DatabaseTestCase;

/**
 * @internal
 */
final class HeroTest extends DatabaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testHasHero()
    {
        $hero = [
            'name'    => 'Ursula Frost',
            'pronoun' => 'she',
        ];

        $this->seeInDatabase('heroes', $hero);
    }

    public function testModelFindHero()
    {
        $model = new HeroModel();

        $hero = $model->find(1);

        $this->assertIsObject($hero);
        $this->assertSame('Hallam Swales', $hero->name);
    }
}
