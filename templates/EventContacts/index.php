<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\EventContact> $eventContacts
 */
?>
<div class="eventContacts index content">
    <?= $this->Html->link(__('Aggiungi contatto per un evento'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contatti degli eventi') ?></h3>
    <div class="">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ['label' => 'Id']) ?></th>
                    <th><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                    <th><?= $this->Paginator->sort('surname', ['label' => 'Cognome']) ?></th>
                    <th><?= $this->Paginator->sort('email', ['label' => 'Email']) ?></th>
                    <th><?= $this->Paginator->sort('event_id', ['label' => 'ID Evento']) ?></th>
                    <th><?= $this->Paginator->sort('user_id', ['label' => 'ID Utente']) ?></th>
                    <th><?= $this->Paginator->sort('role', ['label' => 'Ruolo']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Data creazione']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Data aggiornamento']) ?></th>
                    <th class="actions"><?= __('Azioni') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventContacts as $eventContact): ?>
                <tr>
                    <td><?= $this->Number->format($eventContact->id) ?></td>
                    <td><?= h($eventContact->name) ?></td>
                    <td><?= h($eventContact->surname) ?></td>
                    <td><?= h($eventContact->email) ?></td>
                    <td><?= $eventContact->has('event') ? $this->Html->link($eventContact->event->name, ['controller' => 'Events', 'action' => 'view', $eventContact->event->id]) : '' ?></td>
                    <td><?= $eventContact->has('user') ? $this->Html->link($eventContact->user->id, ['controller' => 'Users', 'action' => 'view', $eventContact->user->id]) : '' ?></td>
                    <td><?= h($eventContact->role) ?></td>
                    <td><?= h($eventContact->created) ?></td>
                    <td><?= h($eventContact->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Vedi'), ['action' => 'view', $eventContact->id]) ?>
                        <?= $this->Html->link(__('Modifica'), ['action' => 'edit', $eventContact->id]) ?>
                        <?= $this->Form->postLink(__('Cancella'), ['action' => 'delete', $eventContact->id], ['confirm' => __('Sei sicuro di voler cancellare # {0}?', $eventContact->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primo')) ?>
            <?= $this->Paginator->prev('< ' . __('precedente')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('prossimo') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} di {{pages}}, mostro {{current}} record di {{count}} totali')) ?></p>
    </div>
</div>
