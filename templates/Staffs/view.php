<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */
?>
<div class="row">
    <div class="column-responsive column-100">
        <body class="jobs view content">
        <hr class="sidebar-divider d-none d-md-block">
        <div class="row">
            <div class="col-md-auto">
                <h3 class="mb-8" style="color: black">Details for Staff id : <?= h($staff->id)?></h3>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p style="color: gray(5);font-size: 20px" >First name:</p>
                            <p style="color: black;font-size: 20px" ><?= h($staff->first_name) ?></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p style="color: gray(5);font-size: 20px" >Last name:</p>
                            <p style="color: black;font-size: 20px" ><?= h($staff->last_name) ?></p>
                        </div>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="col-md-auto">
                        <p style="color: gray(5);font-size: 20px" >Staff's Email:</p>
                        <p style="color: black;font-size: 20px" ><?= h($staff->email_address) ?></p>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="col-md-auto">
                        <p style="color: gray(5);font-size: 20px" >Staff's Phone:</p>
                        <p style="color: black;font-size: 20px" ><?= h($staff->phone_number) ?></p>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <?php if($staff->staff_type == 0):?>
                        <div class="col-md-auto">
                        <p style="color: gray(5);font-size: 20px" >Staff's Type:</p>
                        <p style="color: black;font-size: 20px" >Admin</p>
                        </div>
                    <?php elseif($staff->staff_type == 1):?>
                        <div class="col-md-auto">
                        <p style="color: gray(5);font-size: 20px" >Staff's Type:</p>
                        <p style="color: black;font-size: 20px" >Driver</p>
                        </div>
                    <?php endif;?>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="col-md-auto">
                        <p style="color: gray(5);font-size: 20px" >Password:</p>
                        <p style="color: black;font-size: 20px" ><?= h($staff->password) ?></p>
                    </div>
            </div>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="col-md-auto">
                <h3 class="mb-3" style="color: black">Actions :</h3>
                <hr class="sidebar-divider d-none d-md-block">
                <a href="<?=$this->Url->build(['action' => 'index'])?>" class="form-control button" style="background-color: black;color: white"><i
                        class="fas fa-backward fa-sm text-white"></i> Back</a>
                <hr class="sidebar-divider d-none d-md-block">
                <a href="<?=$this->Url->build(['action' => 'edit',$staff->id])?>" class="form-control button" style="background-color:#4169E1;color: white"><i
                        class="fas fa-edit fa-sm text-white"></i> Edit</a>
                <hr class="sidebar-divider d-none d-md-block">
                <a href="<?=$this->Url->build(['action' => 'delete', $staff->id])?>" onclick="return confirm('Do you want to delete this staff?')" class="form-control button" style="background-color: red;color: white"><i
                        class="fas fa-edit fa-sm text-white"></i> Delete</a>
            </div>
        </div>
    </div>
