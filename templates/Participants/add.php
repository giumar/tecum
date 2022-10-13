<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participant $participant
 * @var \Cake\Collection\CollectionInterface|string[] $events
 */
?>
<div class="row">
    <?php if($this->request->getSession()->read('Auth.id')) : ?>
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <?= $this->Html->link(__('Mostra partecipanti'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <?php endif; ?>
    <div class="column-responsive column-80">
        <div class="participants form content">
            <?= $this->Form->create($participant) ?>
            <?php
            if (isset($event_id)) {
                echo $this->Form->hidden('event_id', ['default' => $event_id]);
                echo $this->Form->hidden('from_event', ['default' => true]);
            }
            ?>
            <fieldset>
                <legend><?= __('Aggiungi partecipante') ?></legend>
                <div class="mb-3">
                    <?= $this->Form->label('name', "Nome", ['class' => 'form-label']); ?>
                    <?= $this->Form->input('name', ['class' => 'form-control']); ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->label('surname', "Cognome", ['class' => 'form-label']); ?>
                    <?= $this->Form->input('surname', ['class' => 'form-control']); ?>
                </div>
                <div class="mb-3">
                    <?php
                    if (!isset($event_id)) {
                        echo $this->Form->label('event_id', "Evento", ['class' => 'form-label']);
                        echo $this->Form->control('event_id', ['options' => $events, 'label' => false]);
                    }
                    ?>
                </div>
                <div class="mb-3">  
                    <?= $this->Form->label('email', "Email", ['class' => 'form-label']); ?>
                    <?= $this->Form->input('email', ['type' => 'email', 'class' => 'form-control']); ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Invia modifiche'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
