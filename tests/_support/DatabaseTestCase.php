<?php namespace ProjectTests\Support;

class DatabaseTestCase extends \CodeIgniter\Test\CIDatabaseTestCase
{
    /**
     * Should the database be refreshed before each test?
     *
     * @var boolean
     */
    protected $refresh = true;

    /**
     * The name of a seed file used for all tests within this test case.
     *
     * @var string
     */
    protected $seed = 'App\Database\Seeds\PlaygroundSeeder';

    /**
     * The path to where we can find the test Seeds directory.
     *
     * @var string
     */
    protected $basePath = APPPATH . 'Database/';

    /**
     * The namespace to help us find the migration classes.
     *
     * @var string
     */
    protected $namespace = 'App';

    public function setUp(): void
    {
        parent::setUp();
    }
}
