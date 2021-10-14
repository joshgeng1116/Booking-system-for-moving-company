<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
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
                <?= $this->Form->create($vehicle) ?>
                    <form>
                        <h3 class="mb-8" style="color: black">Details for Vehicle id : <?= h($vehicle->id)?></h3>

                        <hr class="sidebar-divider d-none d-md-block">

                        <div class="col-md-auto">
                            <?php
                                echo $this->Form->control('rego_number', ["required", "class" => "form-control", "label" => "Rego Number: "]);
                            ?>
                        </div>

                        <hr class="sidebar-divider d-none d-md-block">

                        <div class="col-md-auto">
                            <?php
                                $type=[1=>"2T",2=>"4T",3=>'8T',4=>'10T',5=>'12T'];
                                echo $this->Form->control('vheicle_type', ['options'=>$type, "required", "class" => "form-control", "label" => "Vehicle Type: "]);
                            ?>
                        </div>

                        <hr class="sidebar-divider d-none d-md-block">

                        <div class="col-md-auto">
                            <?php
                                echo $this->Form->control('price_per_hour', [ "class" => "form-control", "label" => "Price / Hour: "]);
                            ?>
                        </div>

                        <hr class="sidebar-divider d-none d-md-block">

                        <div class="col-md-auto">
                            <?php
                                echo $this->Form->control('average_hour', [ "class" => "form-control", "label" => "Average Hour: "]);
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
                <a href="<?=$this->Url->build(['action' => 'delete', $vehicle->id])?>" onclick="return confirm('Do you want to delete this staff?')" class="form-control button" style="background-color: red;color: white"><i
                        class="fas fa-edit fa-sm text-white"></i> Delete</a>
            </div>
        </div>
    </div>
