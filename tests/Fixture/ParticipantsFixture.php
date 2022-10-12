<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ParticipantsFixture
 */
class ParticipantsFixture extends TestFixture
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
                'event_id' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-10-12 10:19:52',
                'modified' => '2022-10-12 10:19:52',
            ],
        ];
        parent::init();
    }
}
