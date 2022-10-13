<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<div class="row">
    <?php
    if($this->request->getSession()->read('Auth.id')) { ?>
    <div class="col-lg-2">
        <aside class="column">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <?= $this->Html->link(__('Modifica evento'), ['action' => 'edit', $event->id], ['class' => '', 'escape' => false]) ?>
                </li>
                <li class="list-group-item">
                    <?= $this->Form->postLink(__('Cancella evento'), ['action' => 'delete', $event->id], ['confirm' => __('Sei sicuro di voler cancellare # {0}?', $event->id), 'class' => 'btn btn-danger']) ?>
                </li>
                <li class="list-group-item">        
                    <?= $this->Html->link(__('Mostra eventi'), ['action' => 'index'], ['class' => '', 'escape' => false]) ?>
                </li>
                <li class="list-group-item">        
                    <?= $this->Html->link(__('<i class="bi bi-plus-square"></i> Aggiungi evento'), ['action' => 'add'], ['class' => '', 'escape' => false]) ?>
                </li>
            </ul>
        </aside>
    </div>
    <?php } ?>
    <div class="col">
        <div class="events view content">
            <h3><?= h($event->name) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($event->name) ?></td>
                </tr>
                <?php if($this->request->getSession()->read("Auth.id")) : ?>
                <tr>
                    <th><?= __('Utente') ?></th>
                    <td><?= $event->has('user') ? $this->Html->link($event->user->id, ['controller' => 'Users', 'action' => 'view', $event->user->id]) : '' ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($event->id) ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <th><?= __('Data inizio') ?></th>
                    <td><?= h($event->start_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data fine') ?></th>
                    <td><?= h($event->end_at) ?></td>
                </tr>
                <?php if($this->request->getSession()->read("Auth.id")) : ?>
                <tr>
                    <th><?= __('Data creazione') ?></th>
                    <td><?= h($event->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data ultima modifica') ?></th>
                    <td><?= h($event->modified) ?></td>
                </tr>
                <?php endif; ?>
            </table>

            <h4>Contatti</h4>
            <table class="table">
                <thead>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Ruolo</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($event['event_contacts'] as $contact) {
                        echo "<tr><td>" . $contact->name . "</td><td>" . $contact->surname . "</td><td>" . $contact->email . "</td><td>" . $contact->role . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?= $this->Html->link(__('Partecipa'), ['controller' => 'Participants', 'action' => 'add', $event->id], ['class' => 'btn btn-primary']) ?>
        </div>
        <?php if($this->request->getSession()->read("Auth.id")) : ?>
        <div class="event participants view content">
            <h3>Partecipanti</h3>
            <table class="table">
                <thead>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Data richiesta</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($event['participants'] as $participant) {
                        echo "<tr><td>" . $participant->name . "</td><td>" . $participant->surname . "</td><td>" . $participant->created . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
        <?php endif; ?>
    </div>
</div>
