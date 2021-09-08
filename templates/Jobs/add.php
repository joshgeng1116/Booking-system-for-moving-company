<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 * @var \Cake\Collection\CollectionInterface|string[] $allocation
 */

$this->disableAutoLayout();

use Cake\Validation\Validator;

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- own custom CSS -->
    <?php
    echo $this->Html->css('home');
    ?>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- favicon -->
    <?= $this->Html->meta(
        'favicon.ico',
        '/img/favicon.png',
        ['type' => 'icon']
    );
    ?>


    <title>Easy Peasy Removalists</title>
</head>

<body>

<!-- boostrap navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <?php
    echo $this->Html->link(
        '<img src="/team102-app_fit3047/img/easy_peasy_default_logo.png" height="50px" class="navbar-brand"/>',
        ['controller' => 'Pages', 'action' => 'home', '_full' => true, 'class' => "navbar-brand"],
        ['escape' => false]  // important
    );
    ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?php
                echo $this->Html->link(
                    'Enquire Now',
                    '/Jobs/add',
                    ['class' => 'nav-link', 'target' => '_blank']
                );
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">The Team</a>
            </li>
        </ul>

    </div>
</nav>
<div class="container w-75">
    <div class="column-responsive column-80">
        <div class="jobs form content">
            <?= $this->Form->create($job) ?>
            <fieldset>

                <h1>tell us about the move</h1>

                <h2>You...</h2>

                <div class="row mx-auto">
                    <?php
                    echo $this->Form->control('customer_first_name', ["required", "class" => "form-control", "label" => "First Name"]);
                    echo $this->Form->control('customer_last_name', ["class" => "form-control", "label" => "Last Name"]);
                    ?>
                </div>
                <div class="row mx-auto">
                    <?php
                    echo $this->Form->control('customer_phone', ["required", "class" => "form-control", "label" => "Phone", "minlength" => 8, "maxlength" => 10, "type" => "tel"]);
                    echo $this->Form->control('customer_email', ["required", "class" => "form-control", "label" => "Email", "type" => "email"]);
                    ?>
                </div>
                <div class="hide_default">
                    <?php
                    echo $this->Form->control('allocation_id', ['options' => $allocation, 'empty' => true, "class" => "hide_default"]);
                    echo $this->Form->control('status', ["required", "class" => "hide_default"]);

                    ?>
                </div>

                <h2>The Job...</h2>

                <div class="row mx-auto">
                    <?php
                    echo $this->Form->control('moving_from', ["required", "class" => "form-control"]);
                    echo $this->Form->control('moving_to', ["required", "class" => "form-control"]);
                    ?>
                </div>
                <div class="row mx-auto input_wide">
                    <?php
                    echo $this->Form->control('list_of_item', ["required", "class" => "form-control input_wide col-md-12", "label" => "Items Being Moved", "type" => "textarea"]);
                    ?>
                </div>

                <h2>The Truck...</h2>

                <div class="row mx-auto">
                    <?php
                    //echo $this->Form->control('size', ["class" => "form-control"]);


                    $truck_size_opts = array("2T" => "Just a few items", "4T" => "1-2 Bedrooms / Small Office", "8T" => "3-4 Bedrooms / Medium Office", "10T" => "4-5 Bedrooms / Medium Office", "12T" => '4-5 Bedrooms / Large Office');
                    echo $this->Form->control('size', array("required", 'options' => $truck_size_opts, 'label' => "Truck Size",
                        'empty' => 'Choose...', 'selected' => 'Choose...', "class" => "form-control"));


                    ?>
                </div>

                <h2>When Suits?</h2>
                <div class="row">
                <div class="center mx-auto">
                    <!-- todo SEE HERE DISHA wrap this in a CakePHP anchor <a> element and link to your asset -->
                   
                    <?php
                        echo $this->Html->link('See Truck Times', array(
                            'controller' => 'allocation', 
                            'action' => 'calendar', 
                        ), array('target' => '_blank')
                        );
                    ?>
                </div>
                </div>
                <br>
                <div class="row mx-auto">
                <div class="alert alert-warning text-center mx-auto" role="alert">
                    Make sure that the truck is available on the date you choose!
                </div>
                </div>
                <div class="row mx-auto">

                </div>

                <div class="row mx-auto">
                    <?php
                    echo $this->Form->control('date', ["required", "class" => "form-control text-center"]);
                    ?>
                </div>
                <div class="hide_default">
                    <?php
                    echo $this->Form->control('deposit_status', ["class" => "hide_default"]);
                    echo $this->Form->control('total_paid', ["class" => "hide_default"]);
                    echo $this->Form->control('total_remaining', ["class" => "hide_default"]);
                    ?>
                </div>
            </fieldset>

            <!-- todo finish implementing with JS next iteration maybe

            <div class="invalid_form mx-auto">
                <div class="alert alert-warning" role="alert">
                    Scroll up to finish completing the form.
                </div>
            </div>



            <div class="valid_form mx-auto">
                <h2>Did We Hear You Right?</h2>
                <p>Review will go here.</p>
                <p class="muted">Something wrong? Click on the incorrect field.</p>

                -->
            <div class="valid_form mx-auto">

                <h2>Let's Do It!</h2>
                <div class="center">
                    <?= $this->Form->button(__('Submit Enquiry'), ["class" => "btn btn-success"]) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>


