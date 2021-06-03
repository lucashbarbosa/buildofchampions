<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChampionsItemsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChampionsItemsTable Test Case
 */
class ChampionsItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChampionsItemsTable
     */
    protected $ChampionsItems;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ChampionsItems',
        'app.Items',
        'app.Champions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ChampionsItems') ? [] : ['className' => ChampionsItemsTable::class];
        $this->ChampionsItems = $this->getTableLocator()->get('ChampionsItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ChampionsItems);

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
