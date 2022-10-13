<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Event> $events
 */
?>
<div class="events index content">
    <?= $this->Html->link(__('Aggiungi evento'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Eventi') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ['label' => 'Id']) ?></th>
                    <th><?= $this->Paginator->sort('name', ['label' => 'Nome']) ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('start_at', ['label' => 'Inizio']) ?></th>
                    <th><?= $this->Paginator->sort('end_at', ['label' => 'Fine']) ?></th>
                    <th><?= $this->Paginator->sort('created', ['label' => 'Creato']) ?></th>
                    <th><?= $this->Paginator->sort('modified', ['label' => 'Ultima modifica']) ?></th>
                    <th class="actions"><?= __('Azioni') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                <tr>
                    <td><?= $this->Number->format($event->id) ?></td>
                    <td><?= h($event->name) ?></td>
                    <td><?= $event->has('user') ? $this->Html->link($event->user->id, ['controller' => 'Users', 'action' => 'view', $event->user->id]) : '' ?></td>
                    <td><?= h($event->start_at) ?></td>
                    <td><?= h($event->end_at) ?></td>
                    <td><?= h($event->created) ?></td>
                    <td><?= h($event->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Vedi'), ['action' => 'view', $event->id]) ?>
                        <?= $this->Html->link(__('Modifica'), ['action' => 'edit', $event->id]) ?>
                        <?= $this->Form->postLink(__('Cancella'), ['action' => 'delete', $event->id], ['confirm' => __('Sei sicuro di vole cancellare # {0}?', $event->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primo')) ?>
            <?= $this->Paginator->prev('< ' . __('precedente')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('prossimo') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} di {{pages}}, mostro {{current}} record di {{count}} totali')) ?></p>
    </div>
</div>
