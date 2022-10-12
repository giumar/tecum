<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Participant $participant
 * @var string[]|\Cake\Collection\CollectionInterface $events
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $participant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $participant->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Participants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="participants form content">
            <?= $this->Form->create($participant) ?>
            <fieldset>
                <legend><?= __('Edit Participant') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('surname');
                    echo $this->Form->control('event_id', ['options' => $events]);
                    echo $this->Form->control('email');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
