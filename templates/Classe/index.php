<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classe[]|\Cake\Collection\CollectionInterface $classe
 */
?>
<div class="classe index content">
    <?= $this->Html->link(__('New Classe'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Classe') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('anno') ?></th>
                    <th><?= $this->Paginator->sort('sezione') ?></th>
                    <th><?= $this->Paginator->sort('anno_scolastico') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($classe as $classe): ?>
                <tr>
                    <td><?= $this->Number->format($classe->id) ?></td>
                    <td><?= $this->Number->format($classe->anno) ?></td>
                    <td><?= h($classe->sezione) ?></td>
                    <td><?= h($classe->anno_scolastico) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $classe->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $classe->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $classe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classe->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
