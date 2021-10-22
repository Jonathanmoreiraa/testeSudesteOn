<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DosagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DosagesTable Test Case
 */
class DosagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DosagesTable
     */
    public $Dosages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Dosages',
        'app.Products',
        'app.Pests',
        'app.Cultures',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Dosages') ? [] : ['className' => DosagesTable::class];
        $this->Dosages = TableRegistry::getTableLocator()->get('Dosages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dosages);

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
