<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */
?>
<?php
echo $this->Html->css('info_edit.css');
?>
<div class="row">
    <div class="column-responsive column-100">
        <body class="jobs view content">
        <hr class="sidebar-divider d-none d-md-block">
        <div class="row">
            <div class="col-md-auto">
                <?= $this->Form->create($staff) ?>
                <form>
                    <h3 class="mb-8" style="color: black">Details for Staff id : <?= h($staff->id)?></h3>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <?php
                            echo $this->Form->control('first_name', ["required", "class" => "form-control", "label" => "First Name: "]);
                            ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?php
                            echo $this->Form->control('last_name', ["required", "class" => "form-control", "label" => "Last Name: "]);
                            ?>
                        </div>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="col-md-auto">
                        <?php
                        echo $this->Form->control('email_address', ["required", "class" => "form-control", "label" => "Email Address: "]);
                        ?>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="col-md-auto">
                        <?php
                        echo $this->Form->control('phone_number', ["required", "class" => "form-control", "label" => "Phone Number: "]);
                        ?>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="col-md-auto">
                        <?php
                        $type=[0=>"Admin",1=>"Driver"];
                        echo $this->Form->control('staff_type', ['options'=>$type, "required", "class" => "form-control", "label" => "Staff Type: "]);
                        ?>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="col-md-auto">
                        <?php
                        echo $this->Form->control('password', [ "class" => "form-control", "label" => "Password: "]);
                        ?>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="col-md-auto">
                        <?= $this->Form->button(__('Save'), ['class' => 'form-control button', 'style'=>'background:#3CB371;color:white', 'id' => 'submit_btn', 'onclick'=>'Changes have been saved']) ?>
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
                <a href="<?=$this->Url->build(['action' => 'delete', $staff->id])?>" onclick="return confirm('Do you want to delete this staff?')" class="form-control button" style="background-color: red;color: white"><i
                        class="fas fa-edit fa-sm text-white"></i> Delete</a>
            </div>
        </div>
    </div>
