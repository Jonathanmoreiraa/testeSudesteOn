<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dosages Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\PestsTable&\Cake\ORM\Association\BelongsTo $Pests
 * @property \App\Model\Table\CulturesTable&\Cake\ORM\Association\BelongsTo $Cultures
 *
 * @method \App\Model\Entity\Dosage get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dosage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dosage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dosage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dosage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dosage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dosage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dosage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DosagesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('dosages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Pests', [
            'foreignKey' => 'pest_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Cultures', [
            'foreignKey' => 'culture_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('permitted_dosage')
            ->maxLength('permitted_dosage', 220)
            ->requirePresence('permitted_dosage', 'create')
            ->notEmptyString('permitted_dosage');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['pest_id'], 'Pests'));
        $rules->add($rules->existsIn(['culture_id'], 'Cultures'));

        return $rules;
    }
}
