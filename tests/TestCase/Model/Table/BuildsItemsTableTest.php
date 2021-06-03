<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildsItemsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildsItemsTable Test Case
 */
class BuildsItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildsItemsTable
     */
    protected $BuildsItems;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BuildsItems',
        'app.Builds',
        'app.Items',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BuildsItems') ? [] : ['className' => BuildsItemsTable::class];
        $this->BuildsItems = $this->getTableLocator()->get('BuildsItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BuildsItems);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
