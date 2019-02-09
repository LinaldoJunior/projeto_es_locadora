<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RentalsTable|\Cake\ORM\Association\HasMany $Rentals
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Rentals', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'user_id'
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
            ->scalar('fullname')
            ->maxLength('fullname', 45)
            ->requirePresence('fullname', 'create')
            ->allowEmptyString('fullname', false);

        $validator
            ->allowEmptyString('access_admin');

        $validator
            ->allowEmptyString('access_attendant');

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', false);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');

        $validator
            ->scalar('gender')
            ->requirePresence('gender', 'create')
            ->allowEmptyString('gender', false);

        $validator
            ->scalar('address')
            ->allowEmptyString('address');

        $validator
            ->scalar('phone_res')
            ->maxLength('phone_res', 45)
            ->allowEmptyString('phone_res');

        $validator
            ->scalar('address_work')
            ->allowEmptyString('address_work');

        $validator
            ->scalar('phone_work')
            ->maxLength('phone_work', 45)
            ->allowEmptyString('phone_work');

        $validator
            ->scalar('cellphone')
            ->maxLength('cellphone', 45)
            ->allowEmptyString('cellphone');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 45)
            ->allowEmptyString('cpf');

        $validator
            ->dateTime('birthdate')
            ->requirePresence('birthdate', 'create')
            ->allowEmptyDateTime('birthdate', false);

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
