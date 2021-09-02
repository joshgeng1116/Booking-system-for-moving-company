<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staffs Model
 *
 * @method \App\Model\Entity\Staff newEmptyEntity()
 * @method \App\Model\Entity\Staff newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staff get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staff findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Staff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staff|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StaffsTable extends Table
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

        $this->setTable('staffs');
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
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->integer('phone_number')
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->scalar('email_address')
            ->maxLength('email_address', 255)
            ->requirePresence('email_address', 'create')
            ->notEmptyString('email_address');

        return $validator;
    }
}
