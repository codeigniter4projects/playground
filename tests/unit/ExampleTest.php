<?php

class ExampleTest extends \CodeIgniter\Test\CIUnitTestCase
{
	public function setUp(): void
	{
		parent::setUp();
	}

	public function testSimple()
	{
		$test = defined('APPPATH');
		$this->assertTrue($test);
	}
}
