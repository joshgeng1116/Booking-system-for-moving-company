<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 */
?>
<?php
$this->disableAutoLayout();
echo $this->Html->css('main.min');
echo $this->Html->script('main.min');
?>

<?php
echo $this->Html->css('home');
echo $this->Html->css('sb-admin-2');
echo $this->Html->css('login');
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
<div class="jobs index content">
    <div>
        </br>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
<!--        <h1 class="h3 mb-0 text-gray-800">--><?//= __('Details for Sta') ?><!--</h1>-->
        <h1 class="h3 mb-0 text-gray-800" style="color: black">Details for Staff id : <?= h($staff->id)?></h1>
    </div>
    <div>
        <?= $this->Form->create($staff) ?>
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
<div>
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
</div>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="center">
            <?php
            echo $this->Form->control('password', [ "class" => "form-control", "label" => "Password: "]);
            echo $this->Form->control('retype_password', ["class" => "form-control", 'type'=>'password']);
            ?>
<!--            <input class="form-control" name="password" type="password" placeholder="password" value="--><?php //echo $password ?><!--"/>-->
        </div>
        <div class="col-md-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'form-control button', 'style'=>'background:#3CB371;color:white', 'id' => 'submit_btn', 'onclick'=>'Changes have been saved']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

