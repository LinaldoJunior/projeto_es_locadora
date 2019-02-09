<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MediaTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MediaTypesTable Test Case
 */
class MediaTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MediaTypesTable
     */
    public $MediaTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MediaTypes',
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
        $config = TableRegistry::getTableLocator()->exists('MediaTypes') ? [] : ['className' => MediaTypesTable::class];
        $this->MediaTypes = TableRegistry::getTableLocator()->get('MediaTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MediaTypes);

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
