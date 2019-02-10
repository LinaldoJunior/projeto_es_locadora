<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MovieMediaType Entity
 *
 * @property int $id
 * @property int $movie_id
 * @property int $media_type_id
 * @property int $quantity
 * @property int|null $active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Movie $movie
 * @property \App\Model\Entity\MediaType $media_type
 * @property \App\Model\Entity\Rental[] $rentals
 */
class MovieMediaType extends Entity
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
        'movie_id' => true,
        'media_type_id' => true,
        'quantity' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'movie' => true,
        'media_type' => true,
        'rentals' => true
    ];
}
