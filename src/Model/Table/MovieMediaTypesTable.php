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
 * @property \App\Model\Table\RentalItemsTable|\Cake\ORM\Association\HasMany $RentalItems
 * @property |\Cake\ORM\Association\HasMany $Rentals
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
        $this->hasMany('RentalItems', [
            'foreignKey' => 'movie_media_type_id'
        ]);
        $this->hasMany('Rentals', [
            'foreignKey' => 'movie_media_type_id'
        ]);

        // Add the behaviour to your table
        $this->addBehavior('Search.Search');

        $this->searchManager()
//            ->add('id', 'Search.Value', [
//                'field' => $this->aliasField('id')
//            ])
//            ->add('movie_type_id', 'Search.Value', [
//                'field' => $this->aliasField('movie_type_id')
//            ])
//            ->add('media_type_id', 'Search.Value', [
//                'field' => $this->aliasField('media_type_id')
//            ])
//            ->add('movie_id', 'Search.Value', [
//                'field' => $this->aliasField('movie_id')
//            ])
//            ->add('movie_id', 'Search.Callback', [
//                'callback' => function ($query, $args, $manager) {
//
//                    $query->contain(['Movies']);
//
//                    $args = explode(" ", $args['movie_id']);
//                    foreach ($args as $arg) {
//                        $data[] = [
//                            'OR' => [
//                                ['Movies.name' => '%' . (Int)$arg . '%'],
//                            ]
//                        ];
//                    }
//                    debug($data);
//                    $query->where($data);
//                    return $query;
//                }
//            ])
            ->add('movie_name', 'Search.Callback', [
                'callback' => function ($query, $args, $manager) {

                    $query->contain(['Movies']);

                    $args = explode(" ", $args['movie_name']);
                    foreach ($args as $arg) {
                        $data[] = [
                            'OR' => [
                                ['Movies.name LIKE' => '%' . $arg . '%']
                            ]
                        ];
                    }
                    $query->where($data);
                    return $query;
                }
            ])
            ->add('movie_cast', 'Search.Callback', [
                'callback' => function ($query, $args, $manager) {

                    $query->contain(['Movies']);

                    $args = explode(" ", $args['movie_cast']);
                    foreach ($args as $arg) {
                        $data[] = [
                            'OR' => [
                                ['Movies.cast LIKE' => '%' . $arg . '%']
                            ]
                        ];
                    }
                    $query->where($data);
                    return $query;
                }
            ])
            ->add('movie_director', 'Search.Callback', [
                'callback' => function ($query, $args, $manager) {

                    $query->contain(['Movies']);

                    $args = explode(" ", $args['movie_director']);
                    foreach ($args as $arg) {
                        $data[] = [
                            'OR' => [
                                ['Movies.director LIKE' => '%' . $arg . '%']
                            ]
                        ];
                    }
                    $query->where($data);
                    return $query;
                }
            ])
            ->add('movie_year', 'Search.Callback', [
                'callback' => function ($query, $args, $manager) {

                    $query->contain(['Movies']);

                    $args = explode(" ", $args['movie_year']);
                    foreach ($args as $arg) {
                        $data[] = [
                            'OR' => [
                                ['Movies.year LIKE' => '%' . $arg . '%']
                            ]
                        ];
                    }
                    $query->where($data);
                    return $query;
                }
            ])
            ->add('movie_movie_gender_id', 'Search.Callback', [
                'callback' => function ($query, $args, $manager) {

                    $query->contain(['Movies']);

                    $args = explode(" ", $args['movie_movie_gender_id']);
                    foreach ($args as $arg) {
                        $data[] = [
                            'OR' => [
                                ['Movies.movie_gender_id' =>  $arg]
                            ]
                        ];
                    }
                    $query->where($data);
                    return $query;
                }
            ])
            ->add('movie_type_id', 'Search.Callback', [
                'callback' => function ($query, $args, $manager) {

                    $query->contain(['MediaTypes']);

                    $args = explode(" ", $args['movie_type_id']);
                    foreach ($args as $arg) {
                        $data[] = [
                            'OR' => [
                                ['MediaTypes.id' =>   $arg]
                            ]
                        ];
                    }
                    $query->where($data);
                    return $query;
                }
            ])
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
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->allowEmptyString('quantity', false);

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->allowEmptyString('active', false);

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
