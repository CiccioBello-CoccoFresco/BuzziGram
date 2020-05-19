<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudenteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudenteTable Test Case
 */
class StudenteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudenteTable
     */
    protected $Studente;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Studente',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Studente') ? [] : ['className' => StudenteTable::class];
        $this->Studente = TableRegistry::getTableLocator()->get('Studente', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Studente);

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
