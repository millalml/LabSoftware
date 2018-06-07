<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ControlManObraTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ControlManObraTable Test Case
 */
class ControlManObraTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ControlManObraTable
     */
    public $ControlManObra;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.control_man_obra',
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
        $config = TableRegistry::exists('ControlManObra') ? [] : ['className' => ControlManObraTable::class];
        $this->ControlManObra = TableRegistry::get('ControlManObra', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ControlManObra);

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
