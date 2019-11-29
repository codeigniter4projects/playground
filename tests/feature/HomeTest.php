<?php

class HomeTest extends \ProjectTests\Support\FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testHomeLoads()
    {
        $response = $this->get('/');

        // Ensure we loaded successfully
        $response->assertStatus(200);

        // Make sure this title text displays on the page somewhere
        $response->assertSee('CodeIgniter 4 Playground');
    }

    public function testHomeDisplaysHeroes()
    {
        $response = $this->get('/');

        // Look for an h2 tag with text Heroes
        $response->assertSee('Heroes', 'h2');

        // Look for an anchor tag with text 'Hallam Swales'
        $response->assertSee('Hallam Swales', 'a');
    }
}
