<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RentalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RentalsTable Test Case
 */
class RentalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RentalsTable
     */
    public $Rentals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Rentals',
        'app.PaymentMethods',
        'app.Users',
        'app.RentalItems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Rentals') ? [] : ['className' => RentalsTable::class];
        $this->Rentals = TableRegistry::getTableLocator()->get('Rentals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rentals);

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
