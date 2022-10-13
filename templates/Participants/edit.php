<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participant $participant
 * @var string[]|\Cake\Collection\CollectionInterface $events
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <?= $this->Form->postLink(
                __('Cancella'),
                ['action' => 'delete', $participant->id],
                ['confirm' => __('Sei sicuro di voler cancellare # {0}?', $participant->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Mostra partecipanti'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="participants form content">
            <?= $this->Form->create($participant) ?>
            <fieldset>
                <legend><?= __('Modifica partecipante') ?></legend>
                <?php
                    echo $this->Form->control('name', ['label' => 'Nome']);
                    echo $this->Form->control('surname', ['label' => 'Cognome']);
                    echo $this->Form->control('event_id', ['options' => $events, 'label' => 'Evento']);
                    echo $this->Form->control('email', ['label' => 'Email']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salva modifiche')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
