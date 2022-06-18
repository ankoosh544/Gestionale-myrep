<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Taxes Model
 *
 * @property \App\Model\Table\MenusTable&\Cake\ORM\Association\HasMany $Menus
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\Tax newEmptyEntity()
 * @method \App\Model\Entity\Tax newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tax[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tax get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tax findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tax patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tax[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tax|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tax saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tax[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tax[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tax[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tax[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TaxesTable extends Table
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

        $this->setTable('taxes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Menus', [
            'foreignKey' => 'tax_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'tax_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->decimal('percentage')
            ->notEmptyString('percentage');

        return $validator;
    }
}
