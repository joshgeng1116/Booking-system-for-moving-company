<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Allocation Entity
 *
 * @property int $id
 * @property int $staff_member1_id
 * @property int $staff_member2_id
 * @property int $vehicle_id
 * @property \Cake\I18n\FrozenDate $date
 *
 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Job[] $jobs
 */
class Allocation extends Entity
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
        'staff_member1_id' => true,
        'staff_member2_id' => true,
        'vehicle_id' => true,
        'date' => true,
        'staff' => true,
        'vehicle' => true,
        'jobs' => true,
    ];
}
