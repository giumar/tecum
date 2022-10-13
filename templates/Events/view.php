<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Events'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Event'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="events view content">
            <h3><?= h($event->name) ?></h3>
            <?= $this->Html->link(__('Partecipa'), ['controller' => 'Participants', 'action' => 'add', $event->id], ['class' => 'button']) ?>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($event->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $event->has('user') ? $this->Html->link($event->user->id, ['controller' => 'Users', 'action' => 'view', $event->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($event->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start At') ?></th>
                    <td><?= h($event->start_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('End At') ?></th>
                    <td><?= h($event->end_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($event->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($event->modified) ?></td>
                </tr>
            </table>
            
            <h3>Contatti</h3>
            <table>
                <tbody>
                    <?php
                    foreach ($event['event_contacts'] as $contact) {
                        echo "<tr><td>" . $contact->name . "</td><td>" . $contact->surname . "</td><td>" . $contact->email . "</td><td>" . $contact->role ."</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
       
        </div>
        <div class="event participants view content">
            <h3>Partecipanti</h3>
            <table>
                <tbody>
                    <?php
                    foreach ($event['participants'] as $participant) {
                        echo "<tr><td>" . $participant->name . "</td><td>" . $participant->surname . "</td><td>" . $participant->created . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
