<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventContact $eventContact
 * @var string[]|\Cake\Collection\CollectionInterface $events
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventContact->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventContact->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Event Contacts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="eventContacts form content">
            <?= $this->Form->create($eventContact) ?>
            <fieldset>
                <legend><?= __('Edit Event Contact') ?></legend>
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
