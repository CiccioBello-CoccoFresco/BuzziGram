<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrequentaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrequentaTable Test Case
 */
class FrequentaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrequentaTable
     */
    protected $Frequenta;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Frequenta',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Frequenta') ? [] : ['className' => FrequentaTable::class];
        $this->Frequenta = TableRegistry::getTableLocator()->get('Frequenta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Frequenta);

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
