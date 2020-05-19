<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frequenta Model
 *
 * @method \App\Model\Entity\Frequentum newEmptyEntity()
 * @method \App\Model\Entity\Frequentum newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Frequentum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Frequentum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Frequentum findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Frequentum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Frequentum[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Frequentum|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frequentum saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frequentum[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Frequentum[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Frequentum[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Frequentum[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FrequentaTable extends Table
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

        $this->setTable('frequenta');
        $this->setDisplayField('studente');
        $this->setPrimaryKey(['studente', 'classe']);
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
            ->integer('studente')
            ->allowEmptyString('studente', null, 'create');

        $validator
            ->integer('classe')
            ->allowEmptyString('classe', null, 'create');

        return $validator;
    }
}
