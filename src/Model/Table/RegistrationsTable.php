<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Registrations Model
 *
 * @method \App\Model\Entity\Registration newEmptyEntity()
 * @method \App\Model\Entity\Registration newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Registration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Registration get($primaryKey, $options = [])
 * @method \App\Model\Entity\Registration findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Registration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Registration[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Registration|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registration saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registration[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Registration[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Registration[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Registration[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class RegistrationsTable extends Table
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

        $this->setTable('registrations');
        $this->setDisplayField('email');
        $this->setPrimaryKey('email');
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
            ->scalar('password')
            ->maxLength('password', 8)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('company_name')
            ->maxLength('company_name', 255)
            ->requirePresence('company_name', 'create')
            ->notEmptyString('company_name');

        $validator
            ->scalar('company_address')
            ->maxLength('company_address', 255)
            ->allowEmptyString('company_address');

        $validator
            ->scalar('company_province')
            ->maxLength('company_province', 255)
            ->allowEmptyString('company_province');

        $validator
            ->scalar('company_city')
            ->maxLength('company_city', 255)
            ->allowEmptyString('company_city');

        $validator
            ->integer('company_cap')
            ->allowEmptyString('company_cap');

        $validator
            ->scalar('company_vat_number')
            ->maxLength('company_vat_number', 255)
            ->allowEmptyString('company_vat_number');

        $validator
            ->scalar('company_pec_address')
            ->maxLength('company_pec_address', 255)
            ->allowEmptyString('company_pec_address');

        return $validator;
    }
}
