<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rental Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime|null $end_date
 * @property \Cake\I18n\FrozenTime|null $return_date
 * @property float|null $pre_paid
 * @property int $payment_method_id
 * @property int $client_id
 * @property int|null $finished
 * @property int $attendant_id
 * @property bool $active
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\PaymentMethod $payment_method
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\MovieMediaType $movie_media_type
 */
class Rental extends Entity
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
        'start_date' => true,
        'end_date' => true,
        'return_date' => true,
        'pre_paid' => true,
        'payment_method_id' => true,
        'client_id' => true,
        'finished' => true,
        'attendant_id' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'payment_method' => true,
        'user' => true,
        'movie_media_type' => true
    ];
}
