<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allocation[]|\Cake\Collection\CollectionInterface $allocation
 */
?>
<div class="allocation index content">
    <?= $this->Html->link(__('New Allocation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Allocation') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('staff_member1_id') ?></th>
                    <th><?= $this->Paginator->sort('staff_member2_id') ?></th>
                    <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allocation as $allocation): ?>
                <tr>
                    <td><?= $this->Number->format($allocation->id) ?></td>
                    <td><?= $this->Number->format($allocation->staff_member1_id) ?></td>
                    <td><?= $allocation->has('staff') ? $this->Html->link($allocation->staff->id, ['controller' => 'Staffs', 'action' => 'view', $allocation->staff->id]) : '' ?></td>
                    <td><?= $allocation->has('vehicle') ? $this->Html->link($allocation->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $allocation->vehicle->id]) : '' ?></td>
                    <td><?= h($allocation->date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $allocation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $allocation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $allocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $allocation->id)]) ?>
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
