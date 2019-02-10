<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RentalItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RentalItemsTable Test Case
 */
class RentalItemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RentalItemsTable
     */
    public $RentalItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.RentalItems',
        'app.Rentals',
        'app.MovieMediaTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RentalItems') ? [] : ['className' => RentalItemsTable::class];
        $this->RentalItems = TableRegistry::getTableLocator()->get('RentalItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RentalItems);

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
