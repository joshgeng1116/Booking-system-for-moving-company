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
            ->maxLength('rego_number', 8, 'Registration plate\'s do not have more than eight characters or numbers.
      ')
            ->requirePresence('rego_number', 'create')
            ->regex('rego_number', '/^[\w]+$/', 'Only letters and number are used in a number plate.')
            ->notEmptyString('rego_number');


        $validator
            ->scalar('vehicle_type')
            ->maxLength('vehicle_type', 255)
            ->requirePresence('vehicle_type', 'create')
            ->notEmptyString('vehicle_type');

        // TODO price per hour validation noot working
        $validator
            ->nonNegativeInteger('price_per_hour', 'Price per hour must be a positive number')
            ->greaterThan('price_per_hour', 0, 'Price per hour must be greater than zero dollars an hour.')
            ->range('price_per_hour', [0, 2147483647], 'Price per hour cannot exceed $2,147,483,647. Enter a smaller number please.
      ')
            ->numeric('price_per_hour', 'Only numbers allowed');

        $validator
            ->nonNegativeInteger('average_hour', 'Price per hour must be a positive number')
            ->greaterThan('average_hour', 0, 'Price per hour must be greater than zero dollars an hour.')
            ->range('average_hour', [0, 2147483647], 'Price per hour cannot exceed $2,147,483,647. Enter a smaller number please.
      ')
            ->numeric('average_hour', 'Only numbers allowed');

        return $validator;
    }
}
