<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
echo $this->Html->css('vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
?>
<div class="jobs index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Jobs') ?></h1>
        <a href="<?=$this->Url->build(['action'=>'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Job</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('customer_first_name') ?></th>
                <th><?= $this->Paginator->sort('customer_last_name') ?></th>
                <th><?= $this->Paginator->sort('customer_phone') ?></th>
                <th><?= $this->Paginator->sort('customer_email') ?></th>
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
                    <td><?= h($job->customer_first_name) ?></td>
                    <td><?= h($job->customer_last_name) ?></td>
                    <td><?= h($job->customer_phone) ?></td>
                    <td><?= h($job->customer_email) ?></td>
                    <td><?= $job->has('allocation') ? $this->Html->link($job->allocation->id, ['controller' => 'Allocation', 'action' => 'view', $job->allocation->id]) : '' ?></td>
                    <td>
                        <?php if($job->status == 1):?>
                            Enquiry
                        <?php elseif($job->status == 2):?>
                            Offer
                        <?php elseif($job->status == 3):?>
                            Job
                        <?php elseif($job->status == 4):?>
                            Picked_Up
                        <?php elseif($job->status == 5):?>
                            In-Transit
                        <?php elseif($job->status == 6):?>
                            Delivery
                        <?php elseif($job->status == 7):?>
                            Completed
                        <?php endif;?>
                    </td>
                    <td><?= h($job->moving_from) ?></td>
                    <td><?= h($job->moving_to) ?></td>
                    <td><?= h($job->list_of_item) ?></td>
                    <td><?= h($job->size) ?></td>
                    <td><?= h($job->date) ?></td>
                    <td>
                        <?php if($job->deposit_status == 1):?>
                            Waiting
                        <?php elseif($job->deposit_status == 2):?>
                            Confirmed
                        <?php endif;?>
                    </td>
                    <td><?= $this->Number->format($job->total_paid) ?></td>
                    <td><?= $this->Number->format($job->total_remaining) ?></td>
                    <td class="Actions">
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
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>
