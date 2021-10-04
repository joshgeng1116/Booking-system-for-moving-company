<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allocation[]|\Cake\Collection\CollectionInterface $allocation
 */
echo $this->Html->css('vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<div class="allocation index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Allocation') ?></h1>
        <a href="<?=$this->Url->build(['action' => 'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Allocation</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('staff_member1_id') ?></th>
                    <th><?= h('staff_member2_id') ?></th>
                    <th><?= h('vehicle_id') ?></th>
                    <th><?= h('date') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allocation as $allocation) : ?>
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
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>
