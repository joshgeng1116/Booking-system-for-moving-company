<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jobs view content">
            <h3><?= h($job->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer First Name') ?></th>
                    <td><?= h($job->customer_first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Last Name') ?></th>
                    <td><?= h($job->customer_last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Email') ?></th>
                    <td><?= h($job->customer_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Allocation') ?></th>
                    <td><?= $job->has('allocation') ? $this->Html->link($job->allocation->id, ['controller' => 'Allocation', 'action' => 'view', $job->allocation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($job->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Moving From') ?></th>
                    <td><?= h($job->moving_from) ?></td>
                </tr>
                <tr>
                    <th><?= __('Moving To') ?></th>
                    <td><?= h($job->moving_to) ?></td>
                </tr>
                <tr>
                    <th><?= __('List Of Item') ?></th>
                    <td><?= h($job->list_of_item) ?></td>
                </tr>
                <tr>
                    <th><?= __('Size') ?></th>
                    <td><?= h($job->size) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deposit Status') ?></th>
                    <td><?= h($job->deposit_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($job->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Phone') ?></th>
                    <td><?= $this->Number->format($job->customer_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Paid') ?></th>
                    <td><?= $this->Number->format($job->total_paid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Remaining') ?></th>
                    <td><?= $this->Number->format($job->total_remaining) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($job->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
