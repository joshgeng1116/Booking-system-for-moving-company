<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 * @var string[]|\Cake\Collection\CollectionInterface $allocation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $job->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jobs form content">
            <?= $this->Form->create($job) ?>
            <fieldset>
                <legend><?= __('Edit Job') ?></legend>
                <?php
                    echo $this->Form->control('customer_first_name');
                    echo $this->Form->control('customer_last_name');
                    echo $this->Form->control('customer_phone');
                    echo $this->Form->control('customer_email');
                    echo $this->Form->control('allocation_id', ['options' => $allocation, 'empty' => true]);
                    echo $this->Form->control('status');
                    echo $this->Form->control('moving_from');
                    echo $this->Form->control('moving_to');
                    echo $this->Form->control('list_of_item');
                    echo $this->Form->control('size');
                    echo $this->Form->control('date');
                    echo $this->Form->control('deposit_status');
                    echo $this->Form->control('total_paid');
                    echo $this->Form->control('total_remaining');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
