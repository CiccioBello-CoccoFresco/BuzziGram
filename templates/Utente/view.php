<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Utente $utente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Utente'), ['action' => 'edit', $utente->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Utente'), ['action' => 'delete', $utente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $utente->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Utente'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Utente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="utente view content">
            <h3><?= h($utente->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($utente->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Token') ?></th>
                    <td><?= h($utente->token) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($utente->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
