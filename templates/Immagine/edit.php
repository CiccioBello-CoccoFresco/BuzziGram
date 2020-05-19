<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Immagine $immagine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $immagine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $immagine->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Immagine'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="immagine form content">
            <?= $this->Form->create($immagine) ?>
            <fieldset>
                <legend><?= __('Edit Immagine') ?></legend>
                <?php
                    echo $this->Form->control('frase');
                    echo $this->Form->control('path');
                    echo $this->Form->control('inserimento');
                    echo $this->Form->control('ultima_modifica');
                    echo $this->Form->control('studente');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
