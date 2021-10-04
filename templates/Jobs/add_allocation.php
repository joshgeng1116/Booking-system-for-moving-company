<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
 */
echo $this->Html->css('vendor/datatables/dataTables.bootstrap4.min.css', ['block' => true]);
echo $this->Html->script('/vendor/datatables/jquery.dataTables.min.js', ['block' => true]);
echo $this->Html->script('/vendor/datatables/dataTables.bootstrap4.min.js', ['block' => true]);
?>
<style>
    .error {
        color: #5a5c69;
     font-size: 1rem;
    }
</style>
<div class="jobs index content">
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

</div>
