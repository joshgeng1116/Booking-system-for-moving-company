<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allocation $allocation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Allocation'), ['action' => 'edit', $allocation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Allocation'), ['action' => 'delete', $allocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $allocation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Allocation'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Allocation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="allocation view content">
            <h3><?= h($allocation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Staff') ?></th>
                    <td><?= $allocation->has('staff') ? $this->Html->link($allocation->staff->id, ['controller' => 'Staffs', 'action' => 'view', $allocation->staff->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehicle') ?></th>
                    <td><?= $allocation->has('vehicle') ? $this->Html->link($allocation->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $allocation->vehicle->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($allocation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff Member1 Id') ?></th>
                    <td><?= $this->Number->format($allocation->staff_member1_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($allocation->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Jobs') ?></h4>
                <?php if (!empty($allocation->jobs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('Allocation Id') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Moving From') ?></th>
                            <th><?= __('Moving To') ?></th>
                            <th><?= __('List Of Item') ?></th>
                            <th><?= __('Size') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Deposit Status') ?></th>
                            <th><?= __('Total Paid') ?></th>
                            <th><?= __('Total Remaining') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($allocation->jobs as $jobs) : ?>
                        <tr>
                            <td><?= h($jobs->id) ?></td>
                            <td><?= h($jobs->customer_id) ?></td>
                            <td><?= h($jobs->allocation_id) ?></td>
                            <td><?= h($jobs->status) ?></td>
                            <td><?= h($jobs->moving_from) ?></td>
                            <td><?= h($jobs->moving_to) ?></td>
                            <td><?= h($jobs->list_of_item) ?></td>
                            <td><?= h($jobs->size) ?></td>
                            <td><?= h($jobs->date) ?></td>
                            <td><?= h($jobs->deposit_status) ?></td>
                            <td><?= h($jobs->total_paid) ?></td>
                            <td><?= h($jobs->total_remaining) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
