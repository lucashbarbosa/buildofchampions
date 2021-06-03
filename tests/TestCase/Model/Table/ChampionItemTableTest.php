<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChampionItemTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChampionItemTable Test Case
 */
class ChampionItemTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChampionItemTable
     */
    protected $ChampionItem;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ChampionItem',
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
        $config = $this->getTableLocator()->exists('ChampionItem') ? [] : ['className' => ChampionItemTable::class];
        $this->ChampionItem = $this->getTableLocator()->get('ChampionItem', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ChampionItem);

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
