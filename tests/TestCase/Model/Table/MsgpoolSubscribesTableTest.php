<?php
namespace Msgpool\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Msgpool\Model\Table\MsgpoolSubscribesTable;

/**
 * Msgpool\Model\Table\MsgpoolSubscribesTable Test Case
 */
class MsgpoolSubscribesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Msgpool\Model\Table\MsgpoolSubscribesTable
     */
    public $MsgpoolSubscribes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.msgpool.msgpool_subscribes',
        'plugin.msgpool.users',
        'plugin.msgpool.msgpool_actions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MsgpoolSubscribes') ? [] : ['className' => MsgpoolSubscribesTable::class];
        $this->MsgpoolSubscribes = TableRegistry::getTableLocator()->get('MsgpoolSubscribes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MsgpoolSubscribes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
