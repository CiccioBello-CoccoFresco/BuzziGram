<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Utente[]|\Cake\Collection\CollectionInterface $utente
 */
?>
<div class="utente index content">
    <?= $this->Html->link(__('New Utente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Utente') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th><?= $this->Paginator->sort('token') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utente as $utente): ?>
                <tr>
                    <td><?= $this->Number->format($utente->id) ?></td>
                    <td><?= h($utente->password) ?></td>
                    <td><?= h($utente->token) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $utente->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $utente->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $utente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utente->id)]) ?>
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
