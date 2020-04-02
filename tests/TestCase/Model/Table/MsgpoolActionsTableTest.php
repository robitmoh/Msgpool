<?php
namespace Msgpool\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Msgpool\Model\Table\MsgpoolActionsTable;

/**
 * Msgpool\Model\Table\MsgpoolActionsTable Test Case
 */
class MsgpoolActionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Msgpool\Model\Table\MsgpoolActionsTable
     */
    public $MsgpoolActions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.msgpool.msgpool_actions',
        'plugin.msgpool.msgpool_subscribe'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MsgpoolActions') ? [] : ['className' => MsgpoolActionsTable::class];
        $this->MsgpoolActions = TableRegistry::getTableLocator()->get('MsgpoolActions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MsgpoolActions);

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
}
