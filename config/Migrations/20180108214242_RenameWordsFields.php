<?php
use Migrations\AbstractMigration;

class RenameWordsFields extends AbstractMigration
{

    public function up()
    {

        $this->table('words')
            ->renameColumn('word','name')
            ->update();
    }

    public function down()
    {

        $this->table('words')
            ->renameColumn('name','word')
            ->update();
    }
}

