<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\EventContact> $eventContacts
 */
?>
<div class="eventContacts index content">
    <?= $this->Html->link(__('New Event Contact'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Event Contacts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('surname') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('event_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
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
                        <?= $this->Html->link(__('View'), ['action' => 'view', $eventContact->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventContact->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventContact->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
