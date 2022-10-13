<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventContact $eventContact
 * @var string[]|\Cake\Collection\CollectionInterface $events
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <?= $this->Form->postLink(
                __('Cancella'),
                ['action' => 'delete', $eventContact->id],
                ['confirm' => __('Sei sicuro di voler cancellare # {0}?', $eventContact->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Mostra contatti per eventi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventContacts form content">
            <?= $this->Form->create($eventContact) ?>
            <fieldset>
                <legend><?= __('Modifica contatto per evento') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nome']);
                    echo $this->Form->control('surname', ['label' => 'Cognome']);
                    echo $this->Form->control('email', ['label' => 'Email']);
                    echo $this->Form->control('event_id', ['options' => $events, 'label' => 'Evento']);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true, 'label' => 'Proprietario']);
                    echo $this->Form->control('role', ['label' => 'Ruolo']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Invia modifiche')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
