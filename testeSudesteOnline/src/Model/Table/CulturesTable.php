<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cultures Model
 *
 * @property \App\Model\Table\DosagesTable&\Cake\ORM\Association\HasMany $Dosages
 *
 * @method \App\Model\Entity\Culture get($primaryKey, $options = [])
 * @method \App\Model\Entity\Culture newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Culture[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Culture|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Culture saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Culture patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Culture[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Culture findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CulturesTable extends Table
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

        $this->setTable('cultures');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Dosages', [
            'foreignKey' => 'culture_id',
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
            ->scalar('name')
            ->maxLength('name', 220)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('type')
            ->maxLength('type', 220)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        return $validator;
    }
}
