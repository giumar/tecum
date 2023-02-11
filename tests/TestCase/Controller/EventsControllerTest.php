<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\EventsController Test Case
 *
 * @uses \App\Controller\EventsController
 */
class EventsControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Events',
        'app.Users',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\EventsController::index()
     */
    public function testIndex(): void {
        //$this->markTestIncomplete('Not implemented yet.');
        $this->get('/events');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\EventsController::view()
     */
    public function testView(): void {
        $this->get('/events/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\EventsController::add()
     */
    public function testAdd(): void {
        $this->get('/events/add');
        $this->assertRedirect();
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\EventsController::edit()
     */
    public function testEditGuest(): void {
        $this->get('/events/edit/1');
        $this->assertRedirectContains('/users/login?redirect=');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\EventsController::edit()
     */
    public function testEditWithUserLoggedIn(): void {
        // Set session data
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email' => 'admin_user@localhost.local',
                // other keys.
                ]
            ]
        ]);

        $this->get('/events/edit/1');
        $this->assertResponseOk();

        //New event data
        $data = [
            'id' => 1,
            'name' => 'new event title',
            'user_id' => 1,
            'start_at' => '2022-10-12 08:00:52',
            'end_at' => '2022-10-12 08:00:52',
            'created' => '2022-10-12 08:00:52',
            'modified' => '2022-10-12 08:00:52',
        ];

        $this->enableCsrfToken();
        $this->enableSecurityToken();

        //Test title change via post
        $this->post('/events/edit/1', $data);
        $this->assertRedirect();
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\EventsController::delete()
     */
    public function testDelete(): void {
        $this->get('/events/delete/1');
        $this->assertRedirect();
    }

}
