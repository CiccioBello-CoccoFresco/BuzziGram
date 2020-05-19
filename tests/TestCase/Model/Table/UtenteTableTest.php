<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UtenteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UtenteTable Test Case
 */
class UtenteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UtenteTable
     */
    protected $Utente;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Utente',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Utente') ? [] : ['className' => UtenteTable::class];
        $this->Utente = TableRegistry::getTableLocator()->get('Utente', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Utente);

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
