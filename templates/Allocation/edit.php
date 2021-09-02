<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Allocation $allocation
 * @var string[]|\Cake\Collection\CollectionInterface $staffs
 * @var string[]|\Cake\Collection\CollectionInterface $vehicles
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $allocation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $allocation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Allocation'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="allocation form content">
            <?= $this->Form->create($allocation) ?>
            <fieldset>
                <legend><?= __('Edit Allocation') ?></legend>
                <?php
                    echo $this->Form->control('staff_member1_id');
                    echo $this->Form->control('staff_member2_id', ['options' => $staffs]);
                    echo $this->Form->control('vehicle_id', ['options' => $vehicles]);
                    echo $this->Form->control('date');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
