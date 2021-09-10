<?php

/**
 * @internal
 */
final class HeroTest extends \Tests\Support\DatabaseTestCase
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
        $model = new \App\Models\HeroModel();

        $hero = $model->find(1);

        $this->assertIsObject($hero);
        $this->assertSame('Hallam Swales', $hero->name);
    }
}
