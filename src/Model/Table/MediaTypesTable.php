<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MediaTypes Model
 *
 * @property \App\Model\Table\MovieMediaTypesTable|\Cake\ORM\Association\HasMany $MovieMediaTypes
 *
 * @method \App\Model\Entity\MediaType get($primaryKey, $options = [])
 * @method \App\Model\Entity\MediaType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MediaType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MediaType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MediaType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MediaType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MediaType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MediaType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MediaTypesTable extends Table
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

        $this->setTable('media_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('MovieMediaTypes', [
            'foreignKey' => 'media_type_id'
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->allowEmptyString('price', false);



        return $validator;
    }
}
