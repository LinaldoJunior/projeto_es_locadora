<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovieMediaTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovieMediaTypesTable Test Case
 */
class MovieMediaTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MovieMediaTypesTable
     */
    public $MovieMediaTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MovieMediaTypes',
        'app.Movies',
        'app.MediaTypes',
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
        $config = TableRegistry::getTableLocator()->exists('MovieMediaTypes') ? [] : ['className' => MovieMediaTypesTable::class];
        $this->MovieMediaTypes = TableRegistry::getTableLocator()->get('MovieMediaTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MovieMediaTypes);

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
