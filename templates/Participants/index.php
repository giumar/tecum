<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Participant> $participants
 */
?>
<div class="participants index content">
    <?= $this->Html->link(__('Aggiungi partecipante'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Partecipanti') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                    <th><?= $this->Paginator->sort('surname', ['label' => 'Cognome']) ?></th>
                    <th><?= $this->Paginator->sort('event_id', ['label' => 'Evento']) ?></th>
                    <th><?= $this->Paginator->sort('email', ['label' => 'Email']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Data di creazione']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Data ultima modifica']) ?></th>
                    <th class="actions"><?= __('Azioni') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($participants as $participant): ?>
                <tr>
                    <td><?= $this->Number->format($participant->id) ?></td>
                    <td><?= h($participant->name) ?></td>
                    <td><?= h($participant->surname) ?></td>
                    <td><?= $participant->has('event') ? $this->Html->link($participant->event->name, ['controller' => 'Events', 'action' => 'view', $participant->event->id]) : '' ?></td>
                    <td><?= h($participant->email) ?></td>
                    <td><?= h($participant->created) ?></td>
                    <td><?= h($participant->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Vedi'), ['action' => 'view', $participant->id]) ?>
                        <?= $this->Html->link(__('Modifica'), ['action' => 'edit', $participant->id]) ?>
                        <?= $this->Form->postLink(__('Cancella'), ['action' => 'delete', $participant->id], ['confirm' => __('Sei sicuro di voler cancellare # {0}?', $participant->id)]) ?>
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
