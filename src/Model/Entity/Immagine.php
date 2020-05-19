<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Immagine Entity
 *
 * @property int $id
 * @property string|null $frase
 * @property string $path
 * @property \Cake\I18n\FrozenDate $inserimento
 * @property \Cake\I18n\FrozenDate $ultima_modifica
 * @property int $studente
 */
class Immagine extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'frase' => true,
        'path' => true,
        'inserimento' => true,
        'ultima_modifica' => true,
        'studente' => true,
    ];
}
