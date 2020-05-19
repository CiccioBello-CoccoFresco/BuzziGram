<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frequentum[]|\Cake\Collection\CollectionInterface $frequenta
 */
?>
<div class="frequenta index content">
    <?= $this->Html->link(__('New Frequentum'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Frequenta') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('studente') ?></th>
                    <th><?= $this->Paginator->sort('classe') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($frequenta as $frequentum): ?>
                <tr>
                    <td><?= $this->Number->format($frequentum->studente) ?></td>
                    <td><?= $this->Number->format($frequentum->classe) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $frequentum->studente]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $frequentum->studente]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $frequentum->studente], ['confirm' => __('Are you sure you want to delete # {0}?', $frequentum->studente)]) ?>
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
