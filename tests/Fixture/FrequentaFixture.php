<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FrequentaFixture
 */
class FrequentaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'frequenta';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'studente' => ['type' => 'integer', 'length' => 5, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'classe' => ['type' => 'integer', 'length' => 3, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'classe' => ['type' => 'index', 'columns' => ['classe'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['studente', 'classe'], 'length' => []],
            'frequenta_ibfk_1' => ['type' => 'foreign', 'columns' => ['classe'], 'references' => ['classe', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'frequenta_ibfk_2' => ['type' => 'foreign', 'columns' => ['studente'], 'references' => ['studente', 'matricola'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'studente' => 1,
                'classe' => 1,
            ],
        ];
        parent::init();
    }
}
