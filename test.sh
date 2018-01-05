#!/bin/bash
composer require --dev dereuromark/cakephp-ide-helper
bin/cake plugin load IdeHelper --cli

composer require friendsofcake/crud-json-api
composer require friendsofcake/search

bin/cake plugin load Crud



./bin/cake bake all books
./bin/cake bake all books_words
./bin/cake bake all users
./bin/cake bake all words

