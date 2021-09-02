<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<div class="jobs index content">
    <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Jobs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th><?= $this->Paginator->sort('allocation_id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('moving_from') ?></th>
                    <th><?= $this->Paginator->sort('moving_to') ?></th>
                    <th><?= $this->Paginator->sort('list_of_item') ?></th>
                    <th><?= $this->Paginator->sort('size') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('deposit_status') ?></th>
                    <th><?= $this->Paginator->sort('total_paid') ?></th>
                    <th><?= $this->Paginator->sort('total_remaining') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobs as $job): ?>
                <tr>
                    <td><?= $this->Number->format($job->id) ?></td>
                    <td><?= $job->has('customer') ? $this->Html->link($job->customer->id, ['controller' => 'Customers', 'action' => 'view', $job->customer->id]) : '' ?></td>
                    <td><?= $job->has('allocation') ? $this->Html->link($job->allocation->id, ['controller' => 'Allocation', 'action' => 'view', $job->allocation->id]) : '' ?></td>
                    <td><?= h($job->status) ?></td>
                    <td><?= h($job->moving_from) ?></td>
                    <td><?= h($job->moving_to) ?></td>
                    <td><?= h($job->list_of_item) ?></td>
                    <td><?= h($job->size) ?></td>
                    <td><?= h($job->date) ?></td>
                    <td><?= h($job->deposit_status) ?></td>
                    <td><?= $this->Number->format($job->total_paid) ?></td>
                    <td><?= $this->Number->format($job->total_remaining) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
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
