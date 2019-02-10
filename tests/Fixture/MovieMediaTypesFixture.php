<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MovieMediaTypesFixture
 *
 */
class MovieMediaTypesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'movie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'media_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'quatity' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'active' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_movie_media_types_movies1_idx' => ['type' => 'index', 'columns' => ['movie_id'], 'length' => []],
            'fk_movie_media_types_media_types1_idx' => ['type' => 'index', 'columns' => ['media_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_movie_media_types_media_types1' => ['type' => 'foreign', 'columns' => ['media_type_id'], 'references' => ['media_types', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_movie_media_types_movies1' => ['type' => 'foreign', 'columns' => ['movie_id'], 'references' => ['movies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'movie_id' => 1,
                'media_type_id' => 1,
                'quatity' => 1,
                'active' => 1,
                'created' => 1549595409,
                'modified' => 1549595409
            ],
        ];
        parent::init();
    }
}
