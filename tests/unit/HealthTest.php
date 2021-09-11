<?php

/**
 * @internal
 */
final class HealthTest extends \CodeIgniter\Test\CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testIsDefinedAppPath()
    {
        $test = defined('APPPATH');

        $this->assertTrue($test);
    }

    public function testBaseUrlHasBeenSet()
    {
        if (getenv('CI') !== false) {
            $this->markTestSkipped('Base URL not available during Continuous Integration');
        }

        $env = $config = false;

        // First check in .env
        if (is_file(HOMEPATH . '.env')) {
            $env = (bool) preg_grep("/^app\\.baseURL = './", file(HOMEPATH . '.env'));
        }

        // Then check the actual config file
        $reader = new \Tests\Support\Libraries\ConfigReader();
        $config = ! empty($reader->baseUrl);

        $this->assertTrue($env || $config);
    }
}
