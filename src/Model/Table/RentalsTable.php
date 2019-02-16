<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rentals Model
 *
 * @property \App\Model\Table\PaymentMethodsTable|\Cake\ORM\Association\BelongsTo $PaymentMethods
 * @property |\Cake\ORM\Association\BelongsTo $MovieMediaTypes
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\RentalItemsTable|\Cake\ORM\Association\HasMany $RentalItems
 *
 * @method \App\Model\Entity\Rental get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rental newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rental[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rental|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rental|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rental patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rental[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rental findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RentalsTable extends Table
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

        $this->setTable('rentals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PaymentMethods', [
            'foreignKey' => 'payment_method_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MovieMediaTypes', [
            'foreignKey' => 'movie_media_type_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'attendant_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('RentalItems', [
            'foreignKey' => 'rental_id'
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
            ->dateTime('start_date')
            ->requirePresence('start_date', 'create')
            ->allowEmptyDateTime('start_date', false);

        $validator
            ->dateTime('end_date')
            ->allowEmptyDateTime('end_date');

        $validator
            ->decimal('pre_paid')
            ->requirePresence('pre_paid', 'create')
            ->allowEmptyString('pre_paid', false);

        $validator
            ->allowEmptyString('finished');


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
        $rules->add($rules->existsIn(['payment_method_id'], 'PaymentMethods'));
        $rules->add($rules->existsIn(['movie_media_type_id'], 'MovieMediaTypes'));
        $rules->add($rules->existsIn(['client_id'], 'Users'));
        $rules->add($rules->existsIn(['attendant_id'], 'Users'));

        return $rules;
    }
}
