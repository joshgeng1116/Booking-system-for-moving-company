<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property string $customer_first_name
 * @property string $customer_last_name
 * @property int $customer_phone
 * @property string $customer_email
 * @property int|null $allocation_id
 * @property int $status
 * @property string $moving_from
 * @property string $moving_to
 * @property string $list_of_item
 * @property string $size
 * @property \Cake\I18n\FrozenDate $date
 * @property int $deposit_status
 * @property float|null $total_paid
 * @property float|null $total_remaining
 *
 * @property \App\Model\Entity\Allocation $allocation
 */
class Job extends Entity
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
        'customer_first_name' => true,
        'customer_last_name' => true,
        'customer_phone' => true,
        'customer_email' => true,
        'allocation_id' => true,
        'status' => true,
        'moving_from' => true,
        'moving_to' => true,
        'list_of_item' => true,
        'size' => true,
        'date' => true,
        'deposit_status' => true,
        'total_paid' => true,
        'total_remaining' => true,
        'allocation' => true,
    ];
}
