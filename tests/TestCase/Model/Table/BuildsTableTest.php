<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildsTable Test Case
 */
class BuildsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildsTable
     */
    protected $Builds;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Builds',
        'app.ChampionBuilds',
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
        $config = $this->getTableLocator()->exists('Builds') ? [] : ['className' => BuildsTable::class];
        $this->Builds = $this->getTableLocator()->get('Builds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Builds);

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
}
