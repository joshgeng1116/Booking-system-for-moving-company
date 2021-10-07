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
        <div class="column-responsive column-100">
            <body class="jobs view content">
            <hr class="sidebar-divider d-none d-md-block">
            <div class="row">
                <div class="col-md-auto">
                <?= $this->Form->create($allocation) ?>
                    <form>
                        <h3 class="mb-8" style="color: black">Add Allocation For Job : <?= h($allocation->id)?></h3>

                        <hr class="sidebar-divider d-none d-md-block">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="col-md-6 mb-3">
                    <?php echo $this->Form->control('staff_member1_id', ['options' => $staffs]); ?>
                    </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="col-md-6 mb-3">
                                <?php echo $this->Form->control('staff_member2_id', ['options' => $staffs]);?>
                            </div>
                            </div>

                        </div>
                        <hr class="sidebar-divider d-none d-md-block">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="col-md-6 mb-3">
                            <?php echo $this->Form->control('vehicle_id', ['options' => $vehicles]);?>
                        </div>
                            </div>

                        <hr class="sidebar-divider d-none d-md-block">

                            <div class="col-md-6 mb-3">
                                <div class="col-md-6 mb-3">
                            <?php echo $this->Form->control('date', ['default' => $job->get('date')]);?>
                        </div>
                        </div>
                        </div>

                        <hr class="sidebar-divider d-none d-md-block">

                        <div class="col-md-auto">
                            <?= $this->Form->button(__('Save'), ['class' => 'form-control button', 'style'=>'background:#3CB371;color:white', 'id' => 'submit_btn', 'onclick'=>'Changes have been saved']) ?>
                            <?= $this->Form->end() ?>
                        </div>
                <?= $this->Form->end() ?>
            </div>
                    </form>
        </div>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="col-md-auto">
                    <h3 class="mb-3" style="color: black">Actions :</h3>
                    <hr class="sidebar-divider d-none d-md-block">
                    <a href="<?=$this->Url->build(['action' => 'index'])?>" class="form-control button" style="background-color: black;color: white"><i
                            class="fas fa-backward fa-sm text-white"></i> Back</a>
                    <hr class="sidebar-divider d-none d-md-block">
                    <a href="<?=$this->Url->build(['action' => 'delete', $allocation->id])?>" onclick="return confirm('Do you want to delete this allocation?')" class="form-control button" style="background-color: red;color: white"><i
                            class="fas fa-edit fa-sm text-white"></i> Delete</a>
    </div>
            </div>
</div>
