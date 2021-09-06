<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
 * @property \App\Model\Table\AllocationTable&\Cake\ORM\Association\BelongsTo $Allocation
 *
 * @method \App\Model\Entity\Job newEmptyEntity()
 * @method \App\Model\Entity\Job newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Job[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Job get($primaryKey, $options = [])
 * @method \App\Model\Entity\Job findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Job patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Job[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Job|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Job saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class JobsTable extends Table
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

        $this->setTable('jobs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Allocation', [
            'foreignKey' => 'allocation_id',
        ]);
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
            ->scalar('customer_first_name')
            ->maxLength('customer_first_name', 255)
            ->requirePresence('customer_first_name', 'create')
            ->notEmptyString('customer_first_name');

        $validator
            ->scalar('customer_last_name')
            ->maxLength('customer_last_name', 255)
            ->requirePresence('customer_last_name', 'create')
            ->notEmptyString('customer_last_name');

        $validator
            ->integer('customer_phone')
            ->requirePresence('customer_phone', 'create')
            ->notEmptyString('customer_phone');

        $validator
            ->scalar('customer_email')
            ->maxLength('customer_email', 255)
            ->requirePresence('customer_email', 'create')
            ->notEmptyString('customer_email');

        $validator
            ->notEmptyString('status');

        $validator
            ->scalar('moving_from')
            ->maxLength('moving_from', 255)
            ->requirePresence('moving_from', 'create')
            ->notEmptyString('moving_from');

        $validator
            ->scalar('moving_to')
            ->maxLength('moving_to', 255)
            ->requirePresence('moving_to', 'create')
            ->notEmptyString('moving_to');

        $validator
            ->scalar('list_of_item')
            ->maxLength('list_of_item', 255)
            ->requirePresence('list_of_item', 'create')
            ->notEmptyString('list_of_item');

        $validator
            ->scalar('size')
            ->maxLength('size', 255)
            ->requirePresence('size', 'create')
            ->notEmptyString('size');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->notEmptyString('deposit_status');

        $validator
            ->numeric('total_paid')
            ->allowEmptyString('total_paid');

        $validator
            ->numeric('total_remaining')
            ->allowEmptyString('total_remaining');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['allocation_id'], 'Allocation'), ['errorField' => 'allocation_id']);

        return $rules;
    }
}
