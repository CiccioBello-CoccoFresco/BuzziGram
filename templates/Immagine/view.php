<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Immagine $immagine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Immagine'), ['action' => 'edit', $immagine->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Immagine'), ['action' => 'delete', $immagine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $immagine->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Immagine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Immagine'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="immagine view content">
            <h3><?= h($immagine->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Frase') ?></th>
                    <td><?= h($immagine->frase) ?></td>
                </tr>
                <tr>
                    <th><?= __('Path') ?></th>
                    <td><?= h($immagine->path) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($immagine->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Studente') ?></th>
                    <td><?= $this->Number->format($immagine->studente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inserimento') ?></th>
                    <td><?= h($immagine->inserimento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ultima Modifica') ?></th>
                    <td><?= h($immagine->ultima_modifica) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
