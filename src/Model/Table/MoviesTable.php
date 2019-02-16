<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Movies Model
 *
 * @property \App\Model\Table\MovieGenresTable|\Cake\ORM\Association\BelongsTo $MovieGenres
 * @property \App\Model\Table\MovieMediaTypesTable|\Cake\ORM\Association\HasMany $MovieMediaTypes
 *
 * @method \App\Model\Entity\Movie get($primaryKey, $options = [])
 * @method \App\Model\Entity\Movie newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Movie[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Movie|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Movie patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Movie[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Movie findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MoviesTable extends Table
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

        $this->setTable('movies');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MovieGenres', [
            'foreignKey' => 'movie_gender_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MovieMediaTypes', [
            'foreignKey' => 'movie_id'
        ]);

        // Add the behaviour to your table
        $this->addBehavior('Search.Search');

        $this->searchManager()
            ->add('movie_gender_id', 'Search.Value', [
                'field' => $this->aliasField('movie_gender_id')
            ])
            ->add('name', 'Search.Value', [
                'field' => $this->aliasField('name')
            ])
            ->add('year', 'Search.Value', [
                'field' => $this->aliasField('year')
            ])
            ->add('gender', 'Search.Value', [
                'field' => $this->aliasField('gender')
            ])
//            ->add('movie_gender_id', 'Search.Callback', [
//                'callback' => function ($query, $args, $manager) {
//
//                    $query->contain(['MovieGenres']);
//
//                    $args = explode(" ", $args['movie_gender_id']);
//                    foreach ($args as $arg) {
//                        $data[] = [
//                            'OR' => [
//                                ['MovieGenres.id' => '%' . (Int)$arg . '%'],
//                            ]
//                        ];
//                    }
//                    debug($data);
//                    $query->where($data);
//                    return $query;
//                }
//            ])
//            ->add('movie_gender_id', 'Search.Callback', [
//                'callback' => function ($query, $args, $manager) {
//
//                    $query->contain(['MovieGenres']);
//
//                    $args = explode(" ", $args['movie_gender_id']);
//                    foreach ($args as $arg) {
//                        $data[] = [
//                            'OR' => [
//                                ['MovieGenres.id' => '%' . $arg . '%'],
//                            ]
//                        ];
//                    }
//                    debug($data);
//                    $query->where($data);
//                    return $query;
//                }
//            ])
        ;

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
            ->scalar('director')
            ->maxLength('director', 255)
            ->allowEmptyString('director');

        $validator
            ->date('year')
            ->allowEmptyDate('year');

        $validator
            ->numeric('grade')
            ->allowEmptyString('grade');

        $validator
            ->integer('duration')
            ->allowEmptyString('duration');

        $validator
            ->scalar('cast')
            ->allowEmptyString('cast');

        $validator
            ->scalar('sinopse')
            ->allowEmptyString('sinopse');

        $validator
            ->requirePresence('released', 'create')
            ->allowEmptyString('released', false);

        $validator
            ->scalar('poster')
            ->maxLength('poster', 255)
            ->allowEmptyString('poster');

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
        $rules->add($rules->existsIn(['movie_gender_id'], 'MovieGenres'));

        return $rules;
    }
}
