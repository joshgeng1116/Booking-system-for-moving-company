<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Staffs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staffs form content">
            <?= $this->Form->create($staff) ?>
            <fieldset>
                <legend><?= __('Add Staff') ?></legend>
                <?php
                    $type_option = array("Admin", "Driver");
                    echo $this->Form->control('First Name');
                    echo $this->Form->control('Last Name');
                    echo $this->Form->control('Phone Number');
                    echo $this->Form->control('Email Address');
                    echo $this->Form->control('Staff Type',['options' => $type_option, 'empty' => true]);
                    echo $this->Form->control('Password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
