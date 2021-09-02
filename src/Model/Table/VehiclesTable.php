<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicles Model
 *
 * @property \App\Model\Table\AllocationTable&\Cake\ORM\Association\HasMany $Allocation
 *
 * @method \App\Model\Entity\Vehicle newEmptyEntity()
 * @method \App\Model\Entity\Vehicle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Vehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Vehicle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class VehiclesTable extends Table
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

        $this->setTable('vehicles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Allocation', [
            'foreignKey' => 'vehicle_id',
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
            ->scalar('rego_number')
            ->maxLength('rego_number', 255)
            ->requirePresence('rego_number', 'create')
            ->notEmptyString('rego_number');

        $validator
            ->scalar('vehicle_type')
            ->maxLength('vehicle_type', 255)
            ->requirePresence('vehicle_type', 'create')
            ->notEmptyString('vehicle_type');

        return $validator;
    }
}
