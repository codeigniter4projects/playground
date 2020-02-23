<?php

class HeroTest extends \Tests\Support\DatabaseTestCase
{
	public function setUp(): void
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
		$this->assertEquals('Hallam Swales', $hero->name);
	}
}
