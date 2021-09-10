<?php

namespace Tests\Support;

use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
abstract class FeatureTestCase extends DatabaseTestCase
{
    use FeatureTestTrait;

    /**
     * If present, will override application
     * routes when using call().
     *
     * @var \CodeIgniter\Router\RouteCollection
     */
    protected $routes;

    /**
     * Values to be set in the SESSION global
     * before running the test.
     *
     * @var array
     */
    protected $session = [];

    /**
     * Enabled auto clean op buffer after request call
     *
     * @var bool
     */
    protected $clean = true;
}
