<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movie Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $director
 * @property \Cake\I18n\FrozenDate|null $year
 * @property int $movie_gender_id
 * @property float|null $grade
 * @property int|null $duration
 * @property string|null $cast
 * @property string|null $sinopse
 * @property int $released
 * @property string|null $poster
 * @property int $active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\MovieGenre $movie_genre
 * @property \App\Model\Entity\MovieMediaType[] $movie_media_types
 */
class Movie extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'director' => true,
        'year' => true,
        'movie_gender_id' => true,
        'grade' => true,
        'duration' => true,
        'cast' => true,
        'sinopse' => true,
        'released' => true,
        'poster' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'movie_genre' => true,
        'movie_media_types' => true
    ];
}
