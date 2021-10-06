<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
echo $this->Html->css('vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="jobs index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Jobs') ?></h1>
        <a href="<?=$this->Url->build(['action' => 'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Job</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= h('Customer Name') ?></th>
                <th><?= h('Status') ?></th>
                <th><?= h('Moving From') ?></th>
                <th><?= h('Moving To') ?></th>
                <th><?= h('Size') ?></th>
                <th><?= h('date') ?></th>
                <th><?= h('deposit_status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($jobs as $job) :?>
                <?php if ($job->status != 6 || $job->total_remaining != 0) :?>

                    <tr>
                        <td><?= h($job->customer_first_name . ' ' . $job->customer_last_name) ?></td>
                        <td>
                            <?php if ($job->status == 0) :?>
                                Enquiry
                            <?php elseif ($job->status == 1) :?>
                                Offer
                            <?php elseif ($job->status == 2) :?>
                                Job
                            <?php elseif ($job->status == 3) :?>
                                Picked-Up
                            <?php elseif ($job->status == 4) :?>
                                In-Transit
                            <?php elseif ($job->status == 5) :?>
                                Delivery
                            <?php elseif ($job->status == 6) :?>
                                Completed
                            <?php endif;?>
                        </td>
                        <td><?= h($job->moving_from) ?></td>
                        <td><?= h($job->moving_to) ?></td>
                        <td><?= h($job->size) ?></td>
                        <td><?= h($job->date) ?></td>
                        <td>
                            <?php if ($job->deposit_status == 0) :?>
                                Waiting
                            <?php elseif ($job->deposit_status == 1) :?>
                                Confirmed
                            <?php endif;?>
                        </td>
                        <td class="Actions">
                            <div>
                                <?= $this->Html->link(__('More Info'), ['action' => 'view', $job->id]) ?>
                            </div>
                            <div>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                            </div>
                            <div>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['style'=>'color:red'], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
                            </div>
                        </td>
                    </tr>
                <?php endif;?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>
