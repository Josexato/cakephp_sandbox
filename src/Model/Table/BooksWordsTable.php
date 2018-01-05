<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BooksWords Model
 *
 * @property \App\Model\Table\WordsTable|\Cake\ORM\Association\BelongsTo $Words
 * @property \App\Model\Table\BooksTable|\Cake\ORM\Association\BelongsTo $Books
 *
 * @method \App\Model\Entity\BooksWord get($primaryKey, $options = [])
 * @method \App\Model\Entity\BooksWord newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BooksWord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BooksWord|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BooksWord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BooksWord[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BooksWord findOrCreate($search, callable $callback = null, $options = [])
 */
class BooksWordsTable extends Table
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

        $this->setTable('books_words');

        $this->belongsTo('Words', [
            'foreignKey' => 'word_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER'
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
            ->scalar('value')
            ->maxLength('value', 45)
            ->allowEmpty('value');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['word_id'], 'Words'));
        $rules->add($rules->existsIn(['book_id'], 'Books'));

        return $rules;
    }
}
