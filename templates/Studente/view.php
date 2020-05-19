<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Studente $studente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Studente'), ['action' => 'edit', $studente->matricola], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Studente'), ['action' => 'delete', $studente->matricola], ['confirm' => __('Are you sure you want to delete # {0}?', $studente->matricola), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Studente'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Studente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="studente view content">
            <h3><?= h($studente->matricola) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($studente->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cognome') ?></th>
                    <td><?= h($studente->cognome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Matricola') ?></th>
                    <td><?= $this->Number->format($studente->matricola) ?></td>
                </tr>
                <tr>
                    <th><?= __('Classe') ?></th>
                    <td><?= $this->Number->format($studente->classe) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rap') ?></th>
                    <td><?= $studente->rap ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
