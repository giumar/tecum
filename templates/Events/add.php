<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <?= $this->Html->link(__('Lista degli eventi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="events form content">
            <?= $this->Form->create($event) ?>
            <fieldset>
                <legend><?= __('Aggiungi evento') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('start_at');
                    echo $this->Form->control('end_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Aggiungi')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
