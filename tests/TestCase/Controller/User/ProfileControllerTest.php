<?php

declare(strict_types=1);

namespace App\Test\TestCase\Controller\User;

use App\Controller\User\ProfileController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\User\ProfileController Test Case
 *
 * @uses \App\Controller\User\ProfileController
 */
class ProfileControllerTest extends TestCase {

    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Users',
    ];

    public function setUp(): void {

        $this->session([
            'Auth' => [
                'id' => 1,
                'email' => 'admin_user@localhost.local',
                // other keys.
            ]
        ]);

        parent::setUp();
    }

    /**
     * Test index method with a guest user
     *
     * @return void
     * @uses \App\Controller\User\ProfileController::index()
    */ 
    public function testIndexRequestedByGuestUser(): void {
        
        $this->session(['Auth' => null]);
        $this->get("/user");
        print $this->getActualOutput();
        $this->assertRedirectContains('/users/login');
    
        $this->get("/user/profile");
        $this->assertRedirectContains('/users/login');
        
    }
    
    
    /**
     * Test index method with a user logged in
     *
     * 
     * @return void
     * @uses \App\Controller\User\ProfileController::index()
     */
    public function testIndexRequestedByAuthenticatedUser(): void {
        $this->get("/user");
        $this->assertResponseOk();
        $this->assertResponseContains("<a class=\"nav-link\" aria-current=\"page\" href=\"/user\">Profile</a>");
    
        $this->get("/user/profile");
        $this->assertResponseOk();
        $this->assertResponseContains("<a class=\"nav-link\" aria-current=\"page\" href=\"/user\">Profile</a>");
        
        //Verifico che ci siano i campi utente nella home del profilo
        $this->assertResponseContains("Utente: " . $this->getSession()->read('Auth.email'));
    }

}
