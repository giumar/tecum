<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventContactsFixture
 */
class EventContactsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'surname' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'event_id' => 1,
                'user_id' => 1,
                'role' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-10-13 04:56:35',
                'modified' => '2022-10-13 04:56:35',
            ],
        ];
        parent::init();
    }
}
