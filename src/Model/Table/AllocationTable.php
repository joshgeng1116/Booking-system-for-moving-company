<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Allocation Model
 *
 * @property \App\Model\Table\StaffsTable&\Cake\ORM\Association\BelongsTo $Staffs
 * @property \App\Model\Table\StaffsTable&\Cake\ORM\Association\BelongsTo $Staffs
 * @property \App\Model\Table\VehiclesTable&\Cake\ORM\Association\BelongsTo $Vehicles
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\HasMany $Jobs
 *
 * @method \App\Model\Entity\Allocation newEmptyEntity()
 * @method \App\Model\Entity\Allocation newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Allocation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Allocation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Allocation findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Allocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Allocation[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Allocation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Allocation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Allocation[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Allocation[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Allocation[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Allocation[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AllocationTable extends Table
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

        $this->setTable('allocation');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Staffs', [
            'foreignKey' => 'staff_member1_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Staffs', [
            'foreignKey' => 'staff_member2_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Jobs', [
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

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
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'), ['errorField' => 'vehicle_id']);
        $rules->add($rules->existsIn(['staff_member1_id'], 'Staffs'), ['errorField' => 'staff_member1_id']);
        $rules->add($rules->existsIn(['staff_member2_id'], 'Staffs'), ['errorField' => 'staff_member2_id']);

        return $rules;
    }
}
