<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Words Model
 *
 * @property \App\Model\Table\BooksTable|\Cake\ORM\Association\BelongsToMany $Books
 *
 * @method \App\Model\Entity\Word get($primaryKey, $options = [])
 * @method \App\Model\Entity\Word newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Word[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Word|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Word patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Word[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Word findOrCreate($search, callable $callback = null, $options = [])
 */
class WordsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('words');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Books', [
            'foreignKey' => 'word_id',
            'targetForeignKey' => 'book_id',
            'joinTable' => 'books_words'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->allowEmpty('name');

        return $validator;
    }
}
