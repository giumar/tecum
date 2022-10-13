<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Event> $events
 */
?>
<div class="events index content">
    <?php if($this->request->getSession()->read('Auth.id')) : ?>
    <?= $this->Html->link(__('Aggiungi evento'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <?php endif; ?>
    <h3><?= __('Eventi') ?></h3>
    <div class="">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ['label' => 'Id']) ?></th>
                    <th><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                    <?php if($this->request->getSession()->read('Auth.id')) : ?>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <?php endif; ?>
                    <th><?= $this->Paginator->sort('start_at', ['label' => 'Inizio']) ?></th>
                    <th><?= $this->Paginator->sort('end_at', ['label' => 'Fine']) ?></th>
                    <?php if($this->request->getSession()->read('Auth.id')) : ?>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Creato']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Ultima modifica']) ?></th>
                    <th class="actions"><?= __('Azioni') ?></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                <tr>
                    <td><?= $this->Number->format($event->id) ?></td>
                    <td><?= h($event->name) ?></td>
                    <?php if($this->request->getSession()->read('Auth.id')) : ?>
                    <td><?= $event->has('user') ? $this->Html->link($event->user->id, ['controller' => 'Users', 'action' => 'view', $event->user->id]) : '' ?></td>
                    <?php endif; ?>
                    <td><?= h($event->start_at) ?></td>
                    <td><?= h($event->end_at) ?></td>
                    <?php if($this->request->getSession()->read('Auth.id')) : ?>
                    <td><?= h($event->created) ?></td>
                    <td><?= h($event->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Vedi'), ['action' => 'view', $event->id]) ?>
                        <?= $this->Html->link(__('Modifica'), ['action' => 'edit', $event->id]) ?>
                        <?= $this->Form->postLink(__('Cancella'), ['action' => 'delete', $event->id], ['confirm' => __('Sei sicuro di vole cancellare # {0}?', $event->id)]) ?>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primo'), ['class'=>'btn btn-default']) ?>
            <?= $this->Paginator->prev('< ' . __('precedente'), ['class'=>'btn']) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('prossimo') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} di {{pages}}, mostro {{current}} record di {{count}} totali')) ?></p>
    </div>
</div>
