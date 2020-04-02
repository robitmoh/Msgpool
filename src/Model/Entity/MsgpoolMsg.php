<?php
namespace Msgpool\Model\Entity;

use Cake\ORM\Entity;

/**
 * MsgpoolMsg Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $date
 * @property string|null $sender_point
 * @property string|null $source
 * @property string|null $type
 * @property int|null $user_id
 * @property int|null $owner_id
 * @property string|null $msg
 * @property string|null $msg_type
 * @property int|null $entity_id
 * @property int|null $state
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Owner $owner
 * @property \App\Model\Entity\Ticket $entity
 */
class MsgpoolMsg extends Entity
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
        'date' => true,
        'sender_point' => true,
        'source' => true,
        'type' => true,
        'user_id' => true,
        'owner_id' => true,
        'msg' => true,
        'msg_type' => true,
        'entity_id' => true,
        'state' => true,
        'user' => true,
        'owner' => true,
        'entity' => true
    ];
}
