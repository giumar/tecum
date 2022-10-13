<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventContact $eventContact
 * @var \Cake\Collection\CollectionInterface|string[] $events
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Event Contacts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventContacts form content">
            <?= $this->Form->create($eventContact) ?>
            <fieldset>
                <legend><?= __('Add Event Contact') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('surname');
                    echo $this->Form->control('email');
                    echo $this->Form->control('event_id', ['options' => $events]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('role');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
