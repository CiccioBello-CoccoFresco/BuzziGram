<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Immagine Model
 *
 * @method \App\Model\Entity\Immagine newEmptyEntity()
 * @method \App\Model\Entity\Immagine newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Immagine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Immagine get($primaryKey, $options = [])
 * @method \App\Model\Entity\Immagine findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Immagine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Immagine[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Immagine|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Immagine saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Immagine[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Immagine[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Immagine[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Immagine[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ImmagineTable extends Table
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

        $this->setTable('immagine');
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
            ->scalar('frase')
            ->maxLength('frase', 100)
            ->allowEmptyString('frase');

        $validator
            ->scalar('path')
            ->maxLength('path', 32)
            ->requirePresence('path', 'create')
            ->notEmptyString('path');

        $validator
            ->date('inserimento')
            ->requirePresence('inserimento', 'create')
            ->notEmptyDate('inserimento');

        $validator
            ->date('ultima_modifica')
            ->requirePresence('ultima_modifica', 'create')
            ->notEmptyDate('ultima_modifica');

        $validator
            ->integer('studente')
            ->requirePresence('studente', 'create')
            ->notEmptyString('studente');

        return $validator;
    }
}
