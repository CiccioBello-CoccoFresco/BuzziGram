<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Utente Model
 *
 * @method \App\Model\Entity\Utente newEmptyEntity()
 * @method \App\Model\Entity\Utente newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Utente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Utente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Utente findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Utente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Utente[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Utente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Utente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Utente[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Utente[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Utente[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Utente[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UtenteTable extends Table
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

        $this->setTable('utente');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('password')
            ->maxLength('password', 32)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('token')
            ->maxLength('token', 32)
            ->allowEmptyString('token');

        return $validator;
    }
}
