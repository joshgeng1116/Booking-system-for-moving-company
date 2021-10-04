<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allocation $allocation
 * @var \Cake\Collection\CollectionInterface|string[] $staffs
 * @var \Cake\Collection\CollectionInterface|string[] $vehicles
 * @var \App\Model\Entity\Job $job
 *  @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<div class="row">
    <aside class="column">
    </aside>
    <div class="column-responsive column-80">
        <div class="allocation form content">
            <?= $this->Form->create($allocation) ?>
            <fieldset>
                <legend><?= __('Add Allocation for Job: '),h($job->id)?></legend>
                <?php
                    echo $this->Form->control('staff_member1_id', ['options' => $staffs]);
                    echo $this->Form->control('staff_member2_id', ['options' => $staffs]);
                    echo $this->Form->control('vehicle_id', ['options' => $vehicles]);
                    echo $this->Form->control('date', ['default' => $job->get('date')]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
