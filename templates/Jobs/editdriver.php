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
<?php
$this->disableAutoLayout();
echo $this->Html->css('main.min');
echo $this->Html->script('main.min');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- own custom CSS -->
    <?php
    echo $this->Html->css('home');
    ?>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- todo favicon not working -->
    <!-- favicon -->
    <?= $this->Html->meta(
        'favicon.ico',
        'img/favicon.png',
        ['type' => 'icon']
    );
    ?>
</head>
<body>
<div class="center">
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
                                            <p style="color: gray(5);font-size: 20px" >First name:</p>
                                            <p style="color: black;font-size: 20px" ><?= h($job->customer_first_name) ?></p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p style="color: gray(5);font-size: 20px" >Last name:</p>
                                        <p style="color: black;font-size: 20px" ><?= h($job->customer_last_name) ?></p>
                                    </div>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                            <p style="color: gray(5);font-size: 20px" >Customer's Email:</p>
                                            <p style="color: black;font-size: 20px" ><?= h($job->customer_email) ?></p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <p style="color: gray(5);font-size: 20px" >Customer's Phone:</p>
                                            <p style="color: black;font-size: 20px" ><?= h($job->customer_phone) ?></p>
                                        </div>
                                </div>

                                    <hr class="sidebar-divider d-none d-md-block">

                                    <div class="mb-3">
                                        <p style="color: gray(5);font-size: 20px" >Moving from:</p>
                                        <p style="color: black;font-size: 20px" ><?= h($job->moving_from) ?></p>
                                    </div>

                                    <hr class="sidebar-divider d-none d-md-block">

                                    <div class="mb-3">
                                        <p style="color: gray(5);font-size: 20px" >Moving to:</p>
                                        <p style="color: black;font-size: 20px" ><?= h($job->moving_to) ?></p>
                                    </div>

                                    <hr class="sidebar-divider d-none d-md-block">

                                    <div class="mb-3">
                                        <p style="color: gray(5);font-size: 20px" >List of Items:</p>
                                        <p style="color: black;font-size: 20px" ><?= h($job->list_of_item) ?></p>
                                    </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <div class="mb-3">
                                    <?php
                                        $status_type=[0=>"Enquiry",1=>"Offer",2=>"Job",3=>"Picked_Up",4=>"In-Transit",5=>'Delivery',6=>'Completed'];
                                        echo $this->Form->control('status', ['options'=>$status_type, "required", "class" => "form-control", "label" => "Job Status: "]);
                                    ?>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">
                                <div class="center">
                                <?= $this->Form->button(__('Save'), ['class' => 'form-control button', 'style'=>'background:#3CB371;color:white', 'id' => 'submit_btn', 'onclick'=>'Changes have been saved']) ?>
                                <?= $this->Form->end() ?>
                                </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</body>
