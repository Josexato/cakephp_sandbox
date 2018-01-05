<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BooksWordsFixture
 *
 */
class BooksWordsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'value' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'word_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'book_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_weightings_words1_idx' => ['type' => 'index', 'columns' => ['word_id'], 'length' => []],
            'fk_books_words_books1_idx' => ['type' => 'index', 'columns' => ['book_id'], 'length' => []],
        ],
        '_constraints' => [
            'fk_books_words_books1' => ['type' => 'foreign', 'columns' => ['book_id'], 'references' => ['books', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'value' => 'Lorem ipsum dolor sit amet',
            'word_id' => '281a5692-f810-454f-a673-7fdecb12fc33',
            'book_id' => '37662173-6ba0-4467-b82b-b81ceb5c8e48'
        ],
    ];
}
