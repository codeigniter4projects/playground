<?php

class ExampleDatabaseTest extends ProjectTests\Support\DatabaseTestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

	public function testDatabaseSimple()
	{
		$model = new \ProjectTests\Support\Models\ExampleModel();

		$objects = $model->findAll();

		$this->assertCount(3, $objects);
	}
}
