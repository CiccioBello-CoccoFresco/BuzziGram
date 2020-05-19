<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Studente[]|\Cake\Collection\CollectionInterface $studente
 */
?>
<div class="studente index content">
    <?= $this->Html->link(__('New Studente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Studente') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('matricola') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('cognome') ?></th>
                    <th><?= $this->Paginator->sort('rap') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studente as $studente): ?>
                <tr>
                    <td><?= $this->Number->format($studente->matricola) ?></td>
                    <td><?= h($studente->nome) ?></td>
                    <td><?= h($studente->cognome) ?></td>
                    <td><?= h($studente->rap) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $studente->matricola]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studente->matricola]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studente->matricola], ['confirm' => __('Are you sure you want to delete # {0}?', $studente->matricola)]) ?>
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
