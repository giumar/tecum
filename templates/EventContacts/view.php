<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventContact $eventContact
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Event Contact'), ['action' => 'edit', $eventContact->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Event Contact'), ['action' => 'delete', $eventContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventContact->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Event Contacts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Event Contact'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventContacts view content">
            <h3><?= h($eventContact->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($eventContact->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Surname') ?></th>
                    <td><?= h($eventContact->surname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($eventContact->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Event') ?></th>
                    <td><?= $eventContact->has('event') ? $this->Html->link($eventContact->event->name, ['controller' => 'Events', 'action' => 'view', $eventContact->event->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $eventContact->has('user') ? $this->Html->link($eventContact->user->id, ['controller' => 'Users', 'action' => 'view', $eventContact->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($eventContact->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($eventContact->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($eventContact->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($eventContact->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
