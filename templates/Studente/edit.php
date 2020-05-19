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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $studente->matricola],
                ['confirm' => __('Are you sure you want to delete # {0}?', $studente->matricola), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Studente'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="studente form content">
            <?= $this->Form->create($studente) ?>
            <fieldset>
                <legend><?= __('Edit Studente') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('cognome');
                    echo $this->Form->control('rap');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
