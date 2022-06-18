<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cities Model
 *
 * @method \App\Model\Entity\City newEmptyEntity()
 * @method \App\Model\Entity\City newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\City[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\City get($primaryKey, $options = [])
 * @method \App\Model\Entity\City findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\City patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\City[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\City|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\City saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CitiesTable extends Table
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

        $this->setTable('cities');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('region')
            ->maxLength('region', 255)
            ->allowEmptyString('region');

        $validator
            ->scalar('province')
            ->maxLength('province', 255)
            ->allowEmptyString('province');

        $validator
            ->scalar('province_code')
            ->maxLength('province_code', 2)
            ->allowEmptyString('province_code');

        $validator
            ->scalar('cadastral_code')
            ->maxLength('cadastral_code', 4)
            ->allowEmptyString('cadastral_code');

        $validator
            ->scalar('postcodes')
            ->maxLength('postcodes', 255)
            ->allowEmptyString('postcodes');

        $validator
            ->scalar('country')
            ->maxLength('country', 255)
            ->allowEmptyString('country');

        return $validator;
    }
}
