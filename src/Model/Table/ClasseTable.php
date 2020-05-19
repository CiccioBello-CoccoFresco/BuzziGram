<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Classe Model
 *
 * @method \App\Model\Entity\Classe newEmptyEntity()
 * @method \App\Model\Entity\Classe newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Classe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Classe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Classe findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Classe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Classe[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Classe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classe[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classe[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classe[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classe[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ClasseTable extends Table
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

        $this->setTable('classe');
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
            ->requirePresence('anno', 'create')
            ->notEmptyString('anno');

        $validator
            ->scalar('sezione')
            ->maxLength('sezione', 2)
            ->requirePresence('sezione', 'create')
            ->notEmptyString('sezione');

        $validator
            ->scalar('anno_scolastico')
            ->maxLength('anno_scolastico', 5)
            ->requirePresence('anno_scolastico', 'create')
            ->notEmptyString('anno_scolastico');

        return $validator;
    }
}
