<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BalancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BalancesTable Test Case
 */
class BalancesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BalancesTable
     */
    public $Balances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.balances',
        'app.accounts',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Balances') ? [] : ['className' => BalancesTable::class];
        $this->Balances = TableRegistry::get('Balances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Balances);

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
