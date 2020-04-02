<?php
namespace Msgpool\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Msgpool\Model\Table\MsgpoolSubscribeTable;

/**
 * Msgpool\Model\Table\MsgpoolSubscribeTable Test Case
 */
class MsgpoolSubscribeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Msgpool\Model\Table\MsgpoolSubscribeTable
     */
    public $MsgpoolSubscribe;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.msgpool.msgpool_subscribe',
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
        $config = TableRegistry::getTableLocator()->exists('MsgpoolSubscribe') ? [] : ['className' => MsgpoolSubscribeTable::class];
        $this->MsgpoolSubscribe = TableRegistry::getTableLocator()->get('MsgpoolSubscribe', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MsgpoolSubscribe);

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
