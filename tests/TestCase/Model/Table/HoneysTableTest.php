<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HoneysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HoneysTable Test Case
 */
class HoneysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HoneysTable
     */
    public $Honeys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.honeys',
        'app.users',
        'app.todos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Honeys') ? [] : ['className' => 'App\Model\Table\HoneysTable'];
        $this->Honeys = TableRegistry::get('Honeys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Honeys);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
