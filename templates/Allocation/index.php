<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allocation[]|\Cake\Collection\CollectionInterface $allocation
 * @var \App\Model\Entity\Staff[]|\Cake\Collection\CollectionInterface $staffs
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
                    <th><?= h('Staff Member1') ?></th>
                    <th><?= h('Staff Member2') ?></th>
                    <th><?= h('Vehicle') ?></th>
                    <th><?= h('Date') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allocation as $allocation) : ?>
                        <tr>
                            <td><?= $this->Number->format($allocation->id) ?></td>
                            <td>
                                <?php foreach ($staffs as $staff){
                                    if($staff->id == $allocation->staff_member1_id){
                                        echo $staff->first_name;
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <?php foreach ($staffs as $staff){
                                    if($staff->id == $allocation->staff_member2_id){
                                        echo $staff->first_name;
                                    }
                                }
                                ?>
                            </td>
                            <td><?= $allocation->has('vehicle') ? $this->Html->link($allocation->vehicle->rego_number, ['controller' => 'Vehicles', 'action' => 'view', $allocation->vehicle->id]) : '' ?></td>
                            <td><?= h($allocation->date) ?></td>
                        </tr>
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
