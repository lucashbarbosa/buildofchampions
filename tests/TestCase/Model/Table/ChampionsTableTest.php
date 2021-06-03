<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChampionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChampionsTable Test Case
 */
class ChampionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChampionsTable
     */
    protected $Champions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Champions') ? [] : ['className' => ChampionsTable::class];
        $this->Champions = $this->getTableLocator()->get('Champions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Champions);

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
