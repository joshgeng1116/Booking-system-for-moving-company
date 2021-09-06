<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $allocation
 */

$this->disableAutoLayout();

?>

<!-- Darren custom HTML -->
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




    <title>Easy Peasy Removalists</title>
</head>

<body>

<!-- boostrap navbar -->

<!-- boostrap navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <?php
    echo $this->Html->link(
        '<img src="/team102-app_fit3047/img/easy_peasy_default_logo.png" height="50px" class="navbar-brand"/>',
        ['controller'=>'Pages', 'action'=>'home','_full'=>true, 'class' => "navbar-brand"],
        ['escape' => false]  // important
    );
    ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
<!-- page title -->
<h1 class="text-center text-title">Tell Us About Your Move</h1>


<!-- landing page content -->
<div class="container w-50">

        <?php
        echo $this->Form->create($job);
        ?>
        <div class="contact_section proceed form_section">

            <h2 class="text-center text-secondary">You...</h2>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="first_name" class="mandatory" id="first_name_label">First Name</label>
                    <?=$this->Form->input('first_name', ["class" => "first_name form-control", "oninput" => "validate(); updateReview(); unlockNextSection();", "maxlength" => "100", "required", "name" => "first_name", "type" => "text", "value" => ""])?>

                </div>
                <div class="form-group col-md-6">
                    <label for="last_name" class="mandatory" id="last_name_label">Last Name</label>
                    <!--<input maxlength="100" type="text" name="last_name" value="" class="last_name form-control" required>-->
                    <?=$this->Form->input('first_name', ["class" => "last_name form-control", "oninput" => "validate(); updateReview(); unlockNextSection();", "maxlength" => "100", "required", "name" => "last_name_name", "type" => "text", "value" => ""])?>

                </div>
            </div>

            <div class="row">

                <div class="form-group col-md-6">
                    <label for="phone_number" class="mandatory" id="phone_label">Phone Number</label>
                    <!--<input type="tel" name="phone_number" minlength="8" maxlength="10" value="" class="phone_number form-control" required>-->
                    <?=$this->Form->input('phone_number', ["class" => "phone_number form-control", "oninput" => "validate(); updateReview(); unlockNextSection();", "minlength"=>"8", "maxlength" => "10", "required", "name" => "phone_number", "type" => "tel", "value" => ""])?>

                </div>
                <div class="form-group col-md-6">
                    <label for="email" aria-describedby="emailHelp" class="mandatory" class="mandatory" id="email_label">Email Address</label>
                    <!--<input maxlength="100" type="email" name="email" value="" class="email form-control" required>-->
                    <?=$this->Form->input('email', ["class" => "email form-control", "oninput" => "validate(); updateReview(); unlockNextSection();", "maxlength" => "100", "required", "name" => "email", "type" => "tel", "value" => ""])?>

                </div>

            </div>

        </div>


        <div class="job_section no-proceed form_section">

            <h2 class="text-center text-secondary">The Job...</h2>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="move_from" class="mandatory" id="from_label">Moving From</label>
                    <!--<input maxlength="400" type="text" name="moving_from" value="" class="moving_from form-control" required>-->
                    <?=$this->Form->input('moving_from', ["class" => "moving_from form-control", "oninput" => "validate(); updateReview(); unlockNextSection();", "maxlength" => "400", "required", "name" => "moving_from", "type" => "text", "value" => ""])?>
                </div>
                <div class="form-group col-md-6">
                    <label for="move_to" class="mandatory" id="to_label">Moving To</label>
                    <!---->
                    <?=$this->Form->input('moving_to', ["class" => "moving_to form-control", "oninput" => "validate(); updateReview(); unlockNextSection();", "maxlength" => "400", "required", "name" => "moving_to", "type" => "text", "value" => ""])?>

                </div>

            </div>
            <div class="form-group">
                <label class="mandatory" for="items_list" id="items_list_label">List of Items</label>
                <!--<textarea maxlength="600" type="text" name="items_list" value="" class="items_list form-control" required></textarea>-->
                <?=$this->Form->input('items_list', ["class" => "items_list form-control", "oninput" => "validate(); updateReview(); unlockNextSection();", "maxlength" => "600", "required", "name" => "items_list", "type" => "textarea", "value" => ""])?>

            </div>



        </div>

        <div class="no-proceed truck_section form_section">

            <h2 class="text-center text-secondary" id="truck_size_label">The Truck...</h2>

            <div class="form-group row justify-content-center">
                <?php
                $options = ['none_chosen' => 'Choose...', '2T' => 'Just a few items', '4T' => '1-2 bedrooms / small office', '8T' => '3-4 bedrooms / medium office', '10T' =>  '4-5 bedrooms / medium office', '12' => '4-5 bedrooms / large office'];
                echo $this->Form->select('truck_size', $options, ['choose' => true, "class" => 'mandatory truck_size form-control', 'required']);

                ?>

                <!--
                <select class="mandatory truck_size form-control" required>
                    <option value="none_chosen" selected>Choose...</option>
                    <option value="2T">Just a few items</option>
                    <option value="4T">1-2 bedrooms / small office</option>
                    <option value="8T">3-4 bedrooms / medium office</option>
                    <option value="10T">4-5 bedrooms / medium office</option>
                    <option value="12T">4-5 bedrooms / large office</option>
                </select>
                -->
            </div>


            <!-- maybe for future implementation
      <h3>We'll be using a _ tonne truck at $_ / hr just so you know.</h3>
    -->


            <div class="no-proceed when_section form_section">
                <h2 class="text-center text-secondary">When Suits?</h2>

                <class="form-group">
                <label for="available_slots_display">Truck Availabilities</label>
                <br />
                <br />

                <!-- calendar here -->
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="start_date" class="mandatory" id="start_label">Start Date</label>
                    <!--<input type="date" name="start_date" value="" class="start_date form-control" required />-->
                    <?=$this->Form->input('start_date', ["class" => "start_date form-control", "oninput" => "validate(); updateReview(); unlockNextSection();", "required", "name" => "start_date", "type" => "date", "value" => ""])?>
                </div>
                <div class="form-group col-md-4">
                    <label for="start_time" class="mandatory" id="start_time_label">Start Time</label>
                    <!--<input type="time" name="start_time" value="" class="start_time form-control" required />-->
                    <?=$this->Form->input('start_time', ["class" => "start_time form-control", "oninput" => "validate(); updateReview(); unlockNextSection();", "required", "name" => "start_time", "type" => "time", "value" => ""])?>
                </div>
                <div class="form-group col-md-4">
                    <label for="end_time" class="mandatory" id="end_time_label">End Time</label>
                    <!--<input type="time" name="end_time" value="" class="end_time form-control" required />-->
                    <?=$this->Form->input('end_time', ["class" => "end_time form-control", "oninput" => "validate(); updateReview(); unlockNextSection();", "required", "name" => "end_time", "type" => "time", "value" => ""])?>
                </div>
            </div>

        </div>
</div>


<div class="no-proceed note_section form_section w-50 mx-auto">
    <div class="form-group">
        <h2 class="text-center text-secondary">Anything Else?</h2>
        <!--<textarea maxlength="500" type="textarea" name="special_note" width="100" class="special_note_input form-control" value="" placeholder="Want us to know something specific? Optional."></textarea>-->
        <?=$this->Form->input('special_note', ["class" => "special_note_input form-control", "name" => "special_note", "type" => "textarea", "value" => "", "placeholder" => "Want us to know something specific? Optional."])?>

    </div>
</div>





<!-- REVIEW PAGE -->
<!-- so customer can review before submitting - saves problems down the line -->
<div class="container no-proceed review_section form_section">

    <h2 class="text-center text-secondary">Have we got it right?</h2>

    <div class="review_panel hide_default">

        <div class="panel panel-default">
            <div class="panel-body">
                <p class="review_message lead text-center">
                </p>
            </div>
        </div>



        <p class="muted text-center">
            Something wrong? Click on the incorrect attribute above or scroll back up.
        </p>

    </div>

    <div class="review-error">
        <div class="alert alert-warning text-center w-50 mx-auto" role="alert">
            We don't think you've got it right! Please scroll up and keep entering your information.
        </div>
    </div>


</div>



<!-- todo uncomment <div class="container no-proceed submit_section form_section"> -->
    <div class="container submit_section form_section">

    <div class="form-group">
        <h2 class="text-center text-secondary">Then Let's Talk!</h2>
        <div class="center">
            <?= $this->Form->button(__('Submit'), ['class' => "btn btn-success submit-btn"]) ?>
        </div>
    </div>


    <div class="form_submit_feedback_section container w-50 hide_default">
        <h2 class="text-center text-secondary">Your request has been submitted!</h2>
        <div class="next_steps row">
            <i class="fas fa-check fa-3x steps_icon col-md-2"></i>
            <h3 class="steps_text col-md-10">Our team will confirm the logistics of your request</h3>
        </div>
        <div class="next_steps row">
            <i class="fas fa-certificate fa-3x steps_icon col-md-2"></i>
            <h3 class="steps_text col-md-10">We will email you a job offer</h3>
        </div>
        <div class="next_steps row">
            <i class="fas fa-money-bill-wave fa-3x steps_icon col-md-2"></i>
            <h3 class="steps_text col-md-10">We will await a 10% job deposit</h3>
        </div>
        <div class="next_steps row">
            <i class="fas fa-truck-moving fa-3x steps_icon col-md-2"></i>
            <h3 class="steps_text col-md-10">The move will occur as agreed</h3>
        </div>

    </div>

</div>

<?= $this->Form->end() ?>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- original JS -->

<?php
echo $this->Html->script('add_enquiry_logic');
?>




</body>

</html>

