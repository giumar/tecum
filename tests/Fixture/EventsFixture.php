<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsFixture
 */
class EventsFixture extends TestFixture
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
                'user_id' => 1,
                'start_at' => '2022-10-12 08:00:52',
                'end_at' => '2022-10-12 08:00:52',
                'created' => '2022-10-12 08:00:52',
                'modified' => '2022-10-12 08:00:52',
            ],
        ];
        parent::init();
    }
}
