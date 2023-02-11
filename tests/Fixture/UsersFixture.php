<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'email' => 'admin_user@localhost.local',
                'password' => 'admin_password',
                'created' => '2022-10-11 11:53:12',
                'modified' => '2022-10-11 11:53:12',
            ],
        ];
        parent::init();
    }
}
