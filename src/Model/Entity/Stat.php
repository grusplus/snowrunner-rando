<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stat Entity
 *
 * @property int $id
 * @property string $user_id
 * @property \Cake\I18n\FrozenDate $retirement_date
 * @property string $total
 * @property string $retirement_money_needed
 * @property string $average_spending_monthly
 * @property string $average_spending_yearly
 * @property string $notes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 */
class Stat extends Entity
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
        'user_id' => true,
        'retirement_date' => true,
        'total' => true,
        'retirement_money_needed' => true,
        'average_spending_monthly' => true,
        'average_spending_yearly' => true,
        'notes' => true,
        'created' => true,
        'modified' => true,
        'user' => true
    ];
}
