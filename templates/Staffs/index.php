<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff[]|\Cake\Collection\CollectionInterface $staffs
 */

echo $this->Html->css('vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
?>
<div class="staffs index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Staffs') ?></h1>
        <a href="<?=$this->Url->build(['action'=>'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Staff</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('First Name') ?></th>
                    <th><?= h('Last Name') ?></th>
                    <th><?= h('Phone Number') ?></th>
                    <th><?= h('Email Address') ?></th>
                    <th><?= h('Staff Type') ?></th>
                    <th><?= h('Password') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($staffs as $staff): ?>
                <tr>
                    <td><?= $this->Number->format($staff->id) ?></td>
                    <td><?= h($staff->first_name) ?></td>
                    <td><?= h($staff->last_name) ?></td>
                    <td><?= h($staff->phone_number) ?></td>
                    <td><?= h($staff->email_address) ?></td>
                    <td>
                        <?php if($staff->type == 0):?>
                            Admin
                        <?php elseif($staff->type == 1):?>
                            Driver
                        <?php endif;?>
                    </td>
                    <td><?= h($staff->password) ?></td>
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
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</div>
