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
    <div class="column-responsive column-80">
        <div class="events form content">
                <?= $this->Form->create($event) ?>
            <fieldset>
                <legend><?= __('Modifica evento') ?></legend>
                <?php
                echo $this->Form->control('name', ['label' => 'Nome']);
                echo $this->Form->control('user_id', ['options' => $users, 'label' => 'Utente']);
                echo $this->Form->control('start_at', ['label' => 'Data di inizio']);
                echo $this->Form->control('end_at', ['label' => 'Data di fine']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salva modifiche')) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="events participants form content">
            <h3>
                Contatti per l'evento
            </h3>
            <?= $this->Html->link(__('Aggiungi contatto'), ['controller' => 'EventContacts', 'action' => 'add', $event->id], ['class' => 'button']) ?>
            <table>
                <tbody>
                <?php
                foreach ($event['event_contacts'] as $contact) {
                    echo "<tr><td>" . $contact->name . "</td><td>" . $contact->surname . "</td><td>" . $contact->role ."</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
