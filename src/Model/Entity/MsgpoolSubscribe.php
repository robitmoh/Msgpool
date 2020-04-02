<?php
namespace Msgpool\Model\Entity;

use Cake\ORM\Entity;

/**
 * MsgpoolSubscribe Entity
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $date
 * @property string|null $sender_point
 * @property string|null $source
 * @property string|null $type
 * @property string|null $level
 * @property string|null $grouping
 * @property string|null $msgpool_action_id
 *
 * @property \App\Model\Entity\User $user
 * @property \Msgpool\Model\Entity\MsgpoolAction $msgpool_action
 */
class MsgpoolSubscribe extends Entity
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
        'date' => true,
        'sender_point' => true,
        'source' => true,
        'type' => true,
        'level' => true,
        'grouping' => true,
        'msgpool_action_id' => true,
        'user' => true,
        'msgpool_action' => true
    ];
}
