<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="col-sm-2">
        <div class="side-nav">
            <h4 class="heading"><?= __('Azioni') ?></h4>
            <?= $this->Html->link(__('Lista degli eventi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="col">
        <div class="events form content">
            <?= $this->Form->create($event) ?>
            <fieldset>
                <legend><?= __('Aggiungi evento') ?></legend>
                <div class="mb-3">
                    <?= $this->Form->label('name', "Nome", ['class' => 'form-label']); ?>
                    <?= $this->Form->input('name', ['type' => 'text', 'class' => 'form-control']); ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->label('user_id', "Utente", ['class' => 'form-label']); ?>
                    <?= $this->Form->control('user_id', ['options' => $users, 'label' => false, 'class' => 'form-control']); ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->label('start_at', "Data di inzio", ['class' => 'form-label']); ?>
                    <?= $this->Form->dateTime('start_at', ['class' => 'form-control']); ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->label('end_at', "Data di fine", ['class' => 'form-label']); ?>
                    <?= $this->Form->dateTime('end_at', ['class' => 'form-control']); ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->label('description', "Descrizione", ['class' => 'form-label']); ?>
                    <?= $this->Form->textarea('description', ['class' => 'form-control']); ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Aggiungi'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
