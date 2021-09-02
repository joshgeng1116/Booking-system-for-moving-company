<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customers view content">
            <h3><?= h($customer->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('First Name') ?></th>
                    <td><?= h($customer->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Name') ?></th>
                    <td><?= h($customer->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email Address') ?></th>
                    <td><?= h($customer->email_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($customer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= $this->Number->format($customer->phone_number) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Jobs') ?></h4>
                <?php if (!empty($customer->jobs)) : ?>
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
                        <?php foreach ($customer->jobs as $jobs) : ?>
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
