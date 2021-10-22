<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PestsTable Test Case
 */
class PestsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PestsTable
     */
    public $Pests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Pests',
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
        $config = TableRegistry::getTableLocator()->exists('Pests') ? [] : ['className' => PestsTable::class];
        $this->Pests = TableRegistry::getTableLocator()->get('Pests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pests);

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
