<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WeightingsFixture
 *
 */
class WeightingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'value' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'word_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'book_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_weightings_words1_idx' => ['type' => 'index', 'columns' => ['word_id'], 'length' => []],
            'fk_weightings_books1_idx' => ['type' => 'index', 'columns' => ['book_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_weightings_books1' => ['type' => 'foreign', 'columns' => ['book_id'], 'references' => ['books', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_weightings_words1' => ['type' => 'foreign', 'columns' => ['word_id'], 'references' => ['words', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 'b30cbe72-ddb2-42e8-a57d-89558c12f2e7',
            'value' => 'Lorem ipsum dolor sit amet',
            'word_id' => '6aa994b3-9067-4d98-aee4-39a346ce3ce9',
            'book_id' => '44bf71a0-6e61-4793-a055-65c8e7e6589c'
        ],
    ];
}
