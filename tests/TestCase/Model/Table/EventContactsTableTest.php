<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventContactsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventContactsTable Test Case
 */
class EventContactsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventContactsTable
     */
    protected $EventContacts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EventContacts',
        'app.Events',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EventContacts') ? [] : ['className' => EventContactsTable::class];
        $this->EventContacts = $this->getTableLocator()->get('EventContacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EventContacts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EventContactsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EventContactsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
