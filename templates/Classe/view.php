<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classe $classe
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Classe'), ['action' => 'edit', $classe->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Classe'), ['action' => 'delete', $classe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classe->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Classe'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Classe'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="classe view content">
            <h3><?= h($classe->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sezione') ?></th>
                    <td><?= h($classe->sezione) ?></td>
                </tr>
                <tr>
                    <th><?= __('Anno Scolastico') ?></th>
                    <td><?= h($classe->anno_scolastico) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($classe->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Anno') ?></th>
                    <td><?= $this->Number->format($classe->anno) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
