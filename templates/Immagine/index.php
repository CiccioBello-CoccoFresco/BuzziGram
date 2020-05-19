<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Immagine[]|\Cake\Collection\CollectionInterface $immagine
 */
?>
<div class="immagine index content">
    <?= $this->Html->link(__('New Immagine'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Immagine') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('frase') ?></th>
                    <th><?= $this->Paginator->sort('path') ?></th>
                    <th><?= $this->Paginator->sort('inserimento') ?></th>
                    <th><?= $this->Paginator->sort('ultima_modifica') ?></th>
                    <th><?= $this->Paginator->sort('studente') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($immagine as $immagine): ?>
                <tr>
                    <td><?= $this->Number->format($immagine->id) ?></td>
                    <td><?= h($immagine->frase) ?></td>
                    <td><?= h($immagine->path) ?></td>
                    <td><?= h($immagine->inserimento) ?></td>
                    <td><?= h($immagine->ultima_modifica) ?></td>
                    <td><?= $this->Number->format($immagine->studente) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $immagine->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $immagine->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $immagine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $immagine->id)]) ?>
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
