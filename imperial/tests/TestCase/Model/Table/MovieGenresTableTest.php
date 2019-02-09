<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MovieGenresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MovieGenresTable Test Case
 */
class MovieGenresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MovieGenresTable
     */
    public $MovieGenres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MovieGenres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MovieGenres') ? [] : ['className' => MovieGenresTable::class];
        $this->MovieGenres = TableRegistry::getTableLocator()->get('MovieGenres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MovieGenres);

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
