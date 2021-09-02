<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff[]|\Cake\Collection\CollectionInterface $staffs
 */
?>
<div class="staffs index content">
    <?= $this->Html->link(__('New Staff'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Staffs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('email_address') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($staffs as $staff): ?>
                <tr>
                    <td><?= $this->Number->format($staff->id) ?></td>
                    <td><?= h($staff->first_name) ?></td>
                    <td><?= h($staff->last_name) ?></td>
                    <td><?= $this->Number->format($staff->phone_number) ?></td>
                    <td><?= h($staff->email_address) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $staff->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staff->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staff->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->id)]) ?>
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
