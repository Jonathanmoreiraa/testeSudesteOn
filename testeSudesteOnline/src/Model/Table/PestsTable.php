<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pests Model
 *
 * @property \App\Model\Table\DosagesTable&\Cake\ORM\Association\HasMany $Dosages
 *
 * @method \App\Model\Entity\Pest get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pest|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pest saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pest findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PestsTable extends Table
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

        $this->setTable('pests');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Dosages', [
            'foreignKey' => 'pest_id',
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
            ->scalar('scientific_name')
            ->maxLength('scientific_name', 220)
            ->allowEmptyString('scientific_name');

        $validator
            ->scalar('pest_group')
            ->allowEmptyString('pest_group');

        return $validator;
    }
}
