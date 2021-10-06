<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle[]|\Cake\Collection\CollectionInterface $vehicles
 */

echo $this->Html->css('vendor/datatables/dataTables.bootstrap4.min.css',['block'=>true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js',['block'=>true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js',['block'=>true]);
?>
<div class="vehicles index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('Vehicles') ?></h1>
        <a href="<?=$this->Url->build(['action'=>'add'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Vehicle</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('Rego Number') ?></th>
                    <th><?= h('Vehicle Type') ?></th>
                    <th><?= h('Price / Hour') ?></th>
                    <th><?= h('Average Hours') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle): ?>
                <tr>
                    <td><?= $this->Number->format($vehicle->id) ?></td>
                    <td><?= h($vehicle->rego_number) ?></td>
                    <td>
                        <?php if($vehicle->vehicle_type == 1):?>
                            2T
                        <?php elseif($vehicle->vehicle_type == 2):?>
                            4T
                        <?php elseif($vehicle->vehicle_type == 3):?>
                            8T
                        <?php elseif($vehicle->vehicle_type == 4):?>
                            10T
                        <?php elseif($vehicle->vehicle_type == 5):?>
                            12T
                        <?php endif;?>
                    </td>
                    <td><?= h($vehicle->price_per_hour) ?></td>
                    <td><?= h($vehicle->average_hour) ?></td>
                    <td class="actions">
                    <div>
                            <?= $this->Html->link(__('More Info'), ['action' => 'view', $vehicle->id]) ?>
                        </div>
                        <div>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicle->id]) ?>
                        </div>
                        <div>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicle->id], ['style'=>'color:red'], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id)]) ?>
                        </div>
                    </td>
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
