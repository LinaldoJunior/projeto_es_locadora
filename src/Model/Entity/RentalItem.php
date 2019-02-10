<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RentalItem Entity
 *
 * @property int $id
 * @property int $rental_id
 * @property int $movie_media_type_id
 * @property int $quantity
 * @property int $active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Rental $rental
 * @property \App\Model\Entity\MovieMediaType $movie_media_type
 */
class RentalItem extends Entity
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
        'rental_id' => true,
        'movie_media_type_id' => true,
        'quantity' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'rental' => true,
        'movie_media_type' => true
    ];
}
