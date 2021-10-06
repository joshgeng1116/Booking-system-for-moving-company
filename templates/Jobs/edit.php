<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 * @var \App\Model\Entity\Staff[]|\Cake\Collection\CollectionInterface $staffs
 * @var \Cake\Collection\CollectionInterface|string[] $staffs
 * @var \Cake\Collection\CollectionInterface|string[] $vehicles
 */
use Cake\Mailer\Mailer;
?>
<div class="row">
    <div class="column-responsive column-100">
        <div class="jobs view content">
        <hr class="sidebar-divider d-none d-md-block">
        <?= $this->Form->create($job) ?>
            <!-- <fieldset> -->
                <div class="row">
                    <form class="needs-validation" novalidate="">
                        <div class="col-md-auto">
                            <h3 class="mb-3" style="color: black">Details for Job id : <?= h($job->id)?>  Size : <?= h($job->size)?>   Date : <?= h($job->date)?></h3>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <?php
                                            echo $this->Form->control('customer_first_name', ["required", "class" => "form-control", "label" => "First Name: "]);
                                        ?>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <?php
                                            echo $this->Form->control('customer_last_name', ["required", "class" => "form-control", "label" => "Last Name: "]);
                                        ?>
                                    </div>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <?php
                                            echo $this->Form->control('customer_email', ["required", "class" => "form-control", "label" => "Customer's Email: "]);
                                        ?>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <?php
                                            echo $this->Form->control('customer_phone', ["required", "class" => "form-control", "label" => "Customer's Phone: "]);
                                        ?>
                                    </div>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="mb-3">
                                    <?php
                                        echo $this->Form->control('moving_from', ["required", "class" => "form-control", "label" => "Moving From: "]);
                                    ?>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="mb-3">
                                    <?php
                                        echo $this->Form->control('moving_to', ["required", "class" => "form-control", "label" => "Moving To: "]);
                                    ?>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="mb-3">
                                    <?php
                                        echo $this->Form->textarea('list_of_item', ["required", "class" => "form-control", "label" => "List of Items: "]);
                                    ?>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="mb-3">
                                    <?php
                                        $status_type=[0=>"Enquiry",1=>"Offer",2=>"Job",3=>"Picked_Up",4=>"In-Transit",5=>'Delivery',6=>'Completed'];
                                        echo $this->Form->control('status', ['options'=>$status_type, "required", "class" => "form-control", "label" => "Job Status: "]);
                                    ?>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="mb-3">
                                    <?php
                                        $deposit_status_type=[0=>"Waiting",1=>"Confirmed"];
                                        echo $this->Form->control('deposit_status', ['options'=>$deposit_status_type, "required", "class" => "form-control", "label" => "Deposit Status: "]);
                                    ?>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">
                        </div>
                        <div class="col-md-auto">
                            <h3 class="mb-3" style="color: black">Allocation : </h3>
                            <hr class="sidebar-divider d-none d-md-block">
                                <?php
                                    echo $this->Form->control('allocation_id', ['options'=>$allocation, "empty"=>true, "class" => "form-control", "label" => "Allocation Id: "]);
                                ?>
                                <hr class="sidebar-divider d-none d-md-block">
                                <div style="text-align: center">
                                    <a href="<?=$this->Url->build(['action' => 'add_allocation', $job->id])?>" class="form-control button" style="background-color:#4169E1;color: white">Add New Allocation For This Job</a>
                                </div>
                            <hr class="sidebar-divider d-none d-md-block">
                            <h3 class="mb-3" style="color: black">Payment Detail : </h3>
                            <hr class="sidebar-divider d-none d-md-block">
                            <div class="mb-3">
                                <?php
                                    echo $this->Form->control('total_paid', [ "class" => "form-control", "label" => "Total Paid: ", 'placeholder'=>'0.00']);
                                ?>
                            </div>
                            <hr class="sidebar-divider d-none d-md-block">
                            <div class="mb-3">
                                <?php
                                    echo $this->Form->control('total_remaining', [ "class" => "form-control", "label" => "Total Remaining: ", 'placeholder'=>'0.00']);
                                ?>
                            </div>
                            <hr class="sidebar-divider d-none d-md-block">
                            <div class="center">
                                <?= $this->Form->button(__('Save'), ['class' => 'form-control button', 'style'=>'background:#3CB371;color:white', 'id' => 'submit_btn', 'onclick'=>'Changes have been saved']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </form>
                    
                    <div class="col-md-auto">
                        <h3 class="mb-3" style="color: black">Actions :</h3>
                        <hr class="sidebar-divider d-none d-md-block">
                        <a href="<?=$this->Url->build(['action' => 'index'])?>" class="form-control button" style="background-color: black;color: white"><i
                                class="fas fa-backward fa-sm text-white"></i> Back</a>
                        <hr class="sidebar-divider d-none d-md-block">
                        <a href="<?=$this->Url->build(['action' => 'view', $job->id])?>" class="form-control button" style="background-color: #4169E1;color: white"><i
                                class="fas fa-edit fa-sm text-white"></i> View</a>
                        <hr class="sidebar-divider d-none d-md-block">
                        <a href="<?=$this->Url->build(['action' => 'delete', $job->id])?>" onclick="return confirm('Do you want to delete this job?')" class="form-control button" style="background-color: red;color: white"><i
                                class="fas fa-edit fa-sm text-white"></i> Delete</a>
                    </div>
            </div>
        </div>
    </div>

