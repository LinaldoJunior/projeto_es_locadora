<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MediaType Entity
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\MovieMediaType[] $movie_media_types
 */
class MediaType extends Entity
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
        'price' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'movie_media_types' => true
    ];
}
