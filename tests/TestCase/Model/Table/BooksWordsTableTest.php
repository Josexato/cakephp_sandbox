<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BooksWordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BooksWordsTable Test Case
 */
class BooksWordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BooksWordsTable
     */
    public $BooksWords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.books_words',
        'app.words',
        'app.books',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BooksWords') ? [] : ['className' => BooksWordsTable::class];
        $this->BooksWords = TableRegistry::get('BooksWords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BooksWords);

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
