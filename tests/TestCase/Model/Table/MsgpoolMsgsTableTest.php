<?php
namespace Msgpool\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Msgpool\Model\Table\MsgpoolMsgsTable;

/**
 * Msgpool\Model\Table\MsgpoolMsgsTable Test Case
 */
class MsgpoolMsgsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Msgpool\Model\Table\MsgpoolMsgsTable
     */
    public $MsgpoolMsgs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.msgpool.msgpool_msgs',
        'plugin.msgpool.users',
        'plugin.msgpool.owners',
        'plugin.msgpool.entities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MsgpoolMsgs') ? [] : ['className' => MsgpoolMsgsTable::class];
        $this->MsgpoolMsgs = TableRegistry::getTableLocator()->get('MsgpoolMsgs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MsgpoolMsgs);

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
