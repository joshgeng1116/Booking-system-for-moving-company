<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vehicle'), ['action' => 'edit', $vehicle->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vehicle'), ['action' => 'delete', $vehicle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicle->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vehicles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vehicle'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vehicles view content">
            <h3><?= h($vehicle->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Rego Number') ?></th>
                    <td><?= h($vehicle->rego_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vehicle Type') ?></th>
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
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vehicle->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Allocation') ?></h4>
                <?php if (!empty($vehicle->allocation)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Staff Member1 Id') ?></th>
                            <th><?= __('Staff Member2 Id') ?></th>
                            <th><?= __('Vehicle Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($vehicle->allocation as $allocation) : ?>
                        <tr>
                            <td><?= h($allocation->id) ?></td>
                            <td><?= h($allocation->staff_member1_id) ?></td>
                            <td><?= h($allocation->staff_member2_id) ?></td>
                            <td><?= h($allocation->vehicle_id) ?></td>
                            <td><?= h($allocation->date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Allocation', 'action' => 'view', $allocation->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Allocation', 'action' => 'edit', $allocation->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Allocation', 'action' => 'delete', $allocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $allocation->id)]) ?>
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
