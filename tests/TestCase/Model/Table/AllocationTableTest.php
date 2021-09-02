<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AllocationTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AllocationTable Test Case
 */
class AllocationTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AllocationTable
     */
    protected $Allocation;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Allocation',
        'app.Staffs',
        'app.Vehicles',
        'app.Jobs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Allocation') ? [] : ['className' => AllocationTable::class];
        $this->Allocation = $this->getTableLocator()->get('Allocation', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Allocation);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AllocationTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AllocationTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
