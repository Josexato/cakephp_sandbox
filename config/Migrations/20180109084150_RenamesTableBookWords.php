<?php
use Migrations\AbstractMigration;

class RenamesTableBookWords extends AbstractMigration
{

    public function up()
    {

        $this->table('books_words')
            ->rename('weightings')
            ->update();
    }

    public function down()
    {

        $this->table('weightings')
            ->rename('books_words')
            ->update();
    }
}

