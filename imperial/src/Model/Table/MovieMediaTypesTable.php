<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MovieMediaTypes Model
 *
 * @property \App\Model\Table\MoviesTable|\Cake\ORM\Association\BelongsTo $Movies
 * @property \App\Model\Table\MediaTypesTable|\Cake\ORM\Association\BelongsTo $MediaTypes
 * @property \App\Model\Table\RentalsTable|\Cake\ORM\Association\HasMany $Rentals
 *
 * @method \App\Model\Entity\MovieMediaType get($primaryKey, $options = [])
 * @method \App\Model\Entity\MovieMediaType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MovieMediaType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MovieMediaType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovieMediaType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MovieMediaType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MovieMediaType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MovieMediaType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MovieMediaTypesTable extends Table
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

        $this->setTable('movie_media_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MediaTypes', [
            'foreignKey' => 'media_type_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Rentals', [
            'foreignKey' => 'movie_media_type_id'
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
            ->integer('quatity')
            ->requirePresence('quatity', 'create')
            ->allowEmptyString('quatity', false);

        $validator
            ->allowEmptyString('active');

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
        $rules->add($rules->existsIn(['movie_id'], 'Movies'));
        $rules->add($rules->existsIn(['media_type_id'], 'MediaTypes'));

        return $rules;
    }
}
