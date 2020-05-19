<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImmagineTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImmagineTable Test Case
 */
class ImmagineTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImmagineTable
     */
    protected $Immagine;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Immagine',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Immagine') ? [] : ['className' => ImmagineTable::class];
        $this->Immagine = TableRegistry::getTableLocator()->get('Immagine', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Immagine);

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
