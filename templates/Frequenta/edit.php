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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $frequentum->studente],
                ['confirm' => __('Are you sure you want to delete # {0}?', $frequentum->studente), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Frequenta'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="frequenta form content">
            <?= $this->Form->create($frequentum) ?>
            <fieldset>
                <legend><?= __('Edit Frequentum') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
