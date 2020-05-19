<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frequentum $frequentum
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Frequentum'), ['action' => 'edit', $frequentum->studente], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Frequentum'), ['action' => 'delete', $frequentum->studente], ['confirm' => __('Are you sure you want to delete # {0}?', $frequentum->studente), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Frequenta'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Frequentum'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="frequenta view content">
            <h3><?= h($frequentum->studente) ?></h3>
            <table>
                <tr>
                    <th><?= __('Studente') ?></th>
                    <td><?= $this->Number->format($frequentum->studente) ?></td>
                </tr>
                <tr>
                    <th><?= __('Classe') ?></th>
                    <td><?= $this->Number->format($frequentum->classe) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
