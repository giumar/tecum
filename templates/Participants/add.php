<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participant $participant
 * @var \Cake\Collection\CollectionInterface|string[] $events
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <?= $this->Html->link(__('Mostra partecipanti'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="participants form content">
            <?= $this->Form->create($participant) ?>
            <?php
            if (isset($event_id)) {
                echo $this->Form->hidden('event_id', ['default' => $event_id]);
            }
            ?>
            <fieldset>
                <legend><?= __('Aggiungi partecipante') ?></legend>
                <?php
                echo $this->Form->control('name', ['label' => 'Nome']);
                echo $this->Form->control('surname', ['label' => 'Cognome']);
                if (!isset($event_id)) {
                    echo $this->Form->control('event_id', ['options' => $events, 'label' => 'Evento']);
                }
                echo $this->Form->control('email', ['label' => 'Email']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Invia modifiche')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
