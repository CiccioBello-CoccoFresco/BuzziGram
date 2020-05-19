<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Studente Model
 *
 * @method \App\Model\Entity\Studente newEmptyEntity()
 * @method \App\Model\Entity\Studente newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Studente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Studente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Studente findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Studente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Studente[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Studente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Studente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Studente[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Studente[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Studente[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Studente[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StudenteTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('studente');
        $this->setDisplayField('matricola');
        $this->setPrimaryKey('matricola');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('matricola')
            ->allowEmptyString('matricola', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 32)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('cognome')
            ->maxLength('cognome', 32)
            ->requirePresence('cognome', 'create')
            ->notEmptyString('cognome');

        $validator
            ->boolean('rap')
            ->allowEmptyString('rap');

        return $validator;
    }
}
