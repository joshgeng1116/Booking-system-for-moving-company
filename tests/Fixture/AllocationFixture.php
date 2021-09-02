<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AllocationFixture
 */
class AllocationFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'allocation';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'staff_member1_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'staff_member2_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'vehicle_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'staff_member1_id' => ['type' => 'index', 'columns' => ['staff_member1_id'], 'length' => []],
            'staff_member2_id' => ['type' => 'index', 'columns' => ['staff_member2_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'vehicle_id' => ['type' => 'unique', 'columns' => ['vehicle_id'], 'length' => []],
            'staff_member1_id_2' => ['type' => 'unique', 'columns' => ['staff_member1_id', 'staff_member2_id', 'vehicle_id', 'date'], 'length' => []],
            'allocation_ibfk_6' => ['type' => 'foreign', 'columns' => ['staff_member1_id'], 'references' => ['staffs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'allocation_ibfk_5' => ['type' => 'foreign', 'columns' => ['staff_member2_id'], 'references' => ['staffs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'allocation_ibfk_3' => ['type' => 'foreign', 'columns' => ['vehicle_id'], 'references' => ['vehicles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'staff_member1_id' => 1,
                'staff_member2_id' => 1,
                'vehicle_id' => 1,
                'date' => '2021-09-02',
            ],
        ];
        parent::init();
    }
}
