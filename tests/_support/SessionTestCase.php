<?php namespace ProjectTests\Support;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Session\Handlers\ArrayHandler;
use Tests\Support\Session\MockSession;

class SessionTestCase extends CIUnitTestCase
{
    /**
     * @var SessionHandler
     */
    protected $session;

    public function setUp(): void
    {
        parent::setUp();

        $this->mockSession();
    }
    
    /**
     * Pre-loads the mock session driver into $this->session.
     *
     * @var string
     */
    protected function mockSession()
    {
        require_once CIPATH . 'tests/_support/Session/MockSession.php';
        $config = config('App');
        $this->session = new MockSession(new ArrayHandler($config, '0.0.0.0'), $config);
        \Config\Services::injectMock('session', $this->session);
    }
}
