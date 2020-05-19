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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $classe->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $classe->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Classe'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="classe form content">
            <?= $this->Form->create($classe) ?>
            <fieldset>
                <legend><?= __('Edit Classe') ?></legend>
                <?php
                    echo $this->Form->control('anno');
                    echo $this->Form->control('sezione');
                    echo $this->Form->control('anno_scolastico');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
