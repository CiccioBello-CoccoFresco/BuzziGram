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
            <?= $this->Html->link(__('List Utente'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="utente form content">
            <?= $this->Form->create($utente) ?>
            <fieldset>
                <legend><?= __('Add Utente') ?></legend>
                <?php
                    echo $this->Form->control('password');
                    echo $this->Form->control('token');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
