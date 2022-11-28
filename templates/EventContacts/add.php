<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventContact $eventContact
 * @var \Cake\Collection\CollectionInterface|string[] $events
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <?= $this->Html->link(__('Monstra contatti per eventi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventContacts form content">
            <?= $this->Form->create($eventContact) ?>
            <fieldset>
                <legend><?= __('Aggiungi contatti ad evento') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nome']);
                    echo $this->Form->control('surname', ['label' => 'Cognome']);
                    echo $this->Form->control('email', ['label' => 'Email']);
                    echo $this->Form->control('event_id', ['options' => $events]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('role', ['label' => 'Ruolo']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Invia modifiche')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
