<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\HomeController Test Case
 *
 * @uses \App\Controller\HomeController
 */
class HomeControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
            //'app.Home',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\HomeController::index()
     */
    public function testIndexAsGuestUser(): void
    {
        $this->get('/');
        $this->assertResponseOk();
    }

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\HomeController::index()
     */
    public function testIndexAsRegisteredUser(): void
    {
        // Set session data
        $this->session([
            'Auth' => [
                'id' => 1,
                'username' => 'testing@localhost.local',
            ],
        ]);

        $this->get('/');
        $this->assertResponseOk();
    }
}
