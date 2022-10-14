<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <?=
            $this->Form->postLink(
                    __('Cancella evento'),
                    ['action' => 'delete', $event->id],
                    ['confirm' => __('Sei sicuro di vole cancellare # {0}?', $event->id), 'class' => 'side-nav-item']
            )
            ?>
            <?= $this->Html->link(__('Lista degli eventi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div>
        <div>
            <?= $this->Form->create($event) ?>
            <fieldset>
                <legend><?= __('Modifica evento') ?></legend>
                <div class="row mb-3">
                    <?= $this->Form->label('name', "Nome", ['class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= $this->Form->input('name', ['type' => 'text', 'class' => 'form-control']); ?>                        
                    </div>
                </div>
                <div class="row mb-3">
                    <?= $this->Form->label('user_id', "Utente", ['class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= $this->Form->control('user_id', ['options' => $users, 'label' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="row mb-3">                
                    <?= $this->Form->label('start_at', 'Data di inizio', ['class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= $this->Form->dateTime('start_at', ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= $this->Form->label('end_at', 'Data di inizio', ['class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= $this->Form->dateTime('end_at', ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= $this->Form->label('description', 'Descrizione', ['class' => 'col-sm-2 col-form-label']); ?>
                    <div class="col-sm-10">
                        <?= $this->Form->textarea('description', ['class' => 'form-control']); ?>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Salva modifiche'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
        <div>
            <hr/>
            <h3>
                Contatti per l'evento
            </h3>
            <?= $this->Html->link(__('Aggiungi contatto'), ['controller' => 'EventContacts', 'action' => 'add', $event->id], ['class' => 'btn btn-primary']) ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Ruolo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($event['event_contacts'] as $contact) {
                        echo "<tr><td>" . $contact->name . "</td><td>" . $contact->surname . "</td><td>" . $contact->role . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
