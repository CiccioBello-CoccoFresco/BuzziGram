<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClasseTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClasseTable Test Case
 */
class ClasseTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClasseTable
     */
    protected $Classe;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Classe',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Classe') ? [] : ['className' => ClasseTable::class];
        $this->Classe = TableRegistry::getTableLocator()->get('Classe', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Classe);

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
