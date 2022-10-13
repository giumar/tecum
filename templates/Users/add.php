<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <?= $this->Html->link(__('Mostra utenti'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Aggiungi utente') ?></legend>
                <?php
                    echo $this->Form->control('email', ['label' => 'Email']);
                    echo $this->Form->control('password', ['label' => 'Password']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salva modifiche')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
