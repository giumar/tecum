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
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?=
            $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $event->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $event->id), 'class' => 'side-nav-item']
            )
            ?>
            <?= $this->Html->link(__('List Events'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="events form content">
                <?= $this->Form->create($event) ?>
            <fieldset>
                <legend><?= __('Edit Event') ?></legend>
                <?php
                echo $this->Form->control('name');
                echo $this->Form->control('user_id', ['options' => $users]);
                echo $this->Form->control('start_at');
                echo $this->Form->control('end_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
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
