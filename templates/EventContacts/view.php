<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventContact $eventContact
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <?= $this->Html->link(__('Modifica contatto per l\'evento'), ['action' => 'edit', $eventContact->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Cancella contatto per l\'evento'), ['action' => 'delete', $eventContact->id], ['confirm' => __('Sei sicuro di voler cancellare # {0}?', $eventContact->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Mostra contatti per l\'evento'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Aggiungi contatto all\'evento'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventContacts view content">
            <h3><?= h($eventContact->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($eventContact->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cognome') ?></th>
                    <td><?= h($eventContact->surname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($eventContact->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Evento') ?></th>
                    <td><?= $eventContact->has('event') ? $this->Html->link($eventContact->event->name, ['controller' => 'Events', 'action' => 'view', $eventContact->event->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Utente') ?></th>
                    <td><?= $eventContact->has('user') ? $this->Html->link($eventContact->user->id, ['controller' => 'Users', 'action' => 'view', $eventContact->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ruolo') ?></th>
                    <td><?= h($eventContact->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($eventContact->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data creazione') ?></th>
                    <td><?= h($eventContact->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data ultima modifica') ?></th>
                    <td><?= h($eventContact->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
