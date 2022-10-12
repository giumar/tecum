<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Participant> $participants
 */
?>
<div class="participants index content">
    <?= $this->Html->link(__('New Participant'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Participants') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('surname') ?></th>
                    <th><?= $this->Paginator->sort('event_id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($participants as $participant): ?>
                <tr>
                    <td><?= $this->Number->format($participant->id) ?></td>
                    <td><?= h($participant->name) ?></td>
                    <td><?= h($participant->surname) ?></td>
                    <td><?= $participant->has('event') ? $this->Html->link($participant->event->name, ['controller' => 'Events', 'action' => 'view', $participant->event->id]) : '' ?></td>
                    <td><?= h($participant->email) ?></td>
                    <td><?= h($participant->created) ?></td>
                    <td><?= h($participant->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $participant->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $participant->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $participant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participant->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
