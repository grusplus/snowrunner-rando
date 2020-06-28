<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Balance Entity
 *
 * @property int $id
 * @property string $account_id
 * @property string $balance
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Account $account
 */
class Balance extends Entity
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
        'account_id' => true,
        'balance' => true,
        'day' => true,
        'created' => true,
        'modified' => true,
        'account' => true
    ];
}
