<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehicle $vehicle
 */
?>
<div class="row">
    <div class="column-responsive column-100">
        <body class="jobs view content">
        <hr class="sidebar-divider d-none d-md-block">
        <div class="row">
            <div class="col-md-auto">
                <h3 class="mb-3" style="color: black">Details for Staff id : <?= h($vehicle->id)?></h3>
                <form class="needs-validation" novalidate="">

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p style="color: gray(5);font-size: 20px" >Rego Number:</p>
                            <p style="color: black;font-size: 20px" ><?= h($vehicle->rego_number) ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p style="color: gray(5);font-size: 20px" >Vehicle Size:</p>
                            <p style="color: black;font-size: 20px" ><?= h($vehicle->vehicle_type) ?></p>
                        </div>
                    </div>

                </form>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="col-md-auto">
                    <h3 class="mb-3" style="color: black">Actions :</h3>
                    <hr class="sidebar-divider d-none d-md-block">
                    <a href="<?=$this->Url->build(['action' => 'index'])?>" class="form-control button" style="background-color: black;color: white"><i
                            class="fas fa-backward fa-sm text-white"></i> Back</a>
                    <hr class="sidebar-divider d-none d-md-block">
                    <a href="<?=$this->Url->build(['action' => 'edit',$vehicle->id])?>" class="form-control button" style="background-color: black;color: white"><i
                            class="fas fa-edit fa-sm text-white"></i> Edit</a>
                    <hr class="sidebar-divider d-none d-md-block">
                    <a href="<?=$this->Url->build(['action' => 'delete', $vehicle->id])?>" onclick="return confirm('Do you want to delete this vehicle?')" class="form-control button" style="background-color: red;color: white"><i
                            class="fas fa-edit fa-sm text-white"></i> Delete</a>
        </div>
    </div>
</div>
