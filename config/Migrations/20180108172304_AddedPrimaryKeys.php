<?php
use Migrations\AbstractMigration;

class AddedPrimaryKeys extends AbstractMigration
{

    public function up()
    {
        $this->table('books_words')

            ->addPrimaryKey(['books_id','word_id'])
            ->addColumn('meh', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('books_words')
            ->dropForeignKey(
                [
                    'word_id',
                    'book_id',
                ]
            )
            ->removeColumn('meh')
            ->addForeignKey(
                'book_id',
                'books',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'word_id',
                'words',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();;
    }
}

