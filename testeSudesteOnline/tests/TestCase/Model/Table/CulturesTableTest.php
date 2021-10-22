<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CulturesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CulturesTable Test Case
 */
class CulturesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CulturesTable
     */
    public $Cultures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Cultures',
        'app.Dosages',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Cultures') ? [] : ['className' => CulturesTable::class];
        $this->Cultures = TableRegistry::getTableLocator()->get('Cultures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cultures);

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
