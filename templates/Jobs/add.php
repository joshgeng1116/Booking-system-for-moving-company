<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 * @var \Cake\Collection\CollectionInterface|string[] $allocation
 */

$this->disableAutoLayout();

?>

<?php
$this->disableAutoLayout();
echo $this->Html->css('main.min');
echo $this->Html->css('validation.css');
echo $this->Html->script('main.min');
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
        $this->Html->image('easy_peasy_default_logo.png', ['alt' => 'Easy Peasy logo', 'class' => 'navbar-brand', 'height' => '50px']),
        ['controller' => 'Pages', 'action' => 'home', '_full' => true, 'class' => 'navbar-brand'],
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
                    ['class' => 'nav-link', 'target' => '_self']
                );
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">The Team</a>
            </li>
        </ul>

    </div>
</nav>

<!-- form content -->
<div class="container w-75">
    <div class="column-responsive column-80">
        <div class="jobs form content">
            <?= $this->Form->create($job) ?>
            <fieldset>

                <h1>tell us about the move</h1>

                <div class="section_YOU">

                    <h2>You...</h2>

                    <div class="row mx-auto">
                        <?php
<<<<<<< HEAD
                        echo $this->Form->control('customer_first_name', ['required', 'class' => 'form-control', 'label' => 'First Name']);
                        echo $this->Form->control('customer_last_name', ['class' => 'form-control', 'label' => 'Last Name']);
=======
                        echo $this->Form->control('customer_first_name', ["required", "class" => "form-control", "label" => "First Name", "placeholder" => "John"]);
                        echo $this->Form->control('customer_last_name', ["class" => "form-control", "label" => "Last Name", "placeholder" => "Doe"]);
>>>>>>> d318ba5ebccd4c68cc99ad7d2d3971e0170d991f
                        ?>
                    </div>
                    <div class="row mx-auto">
                        <?php
<<<<<<< HEAD
                        echo $this->Form->control('customer_phone', ['required', 'class' => 'form-control', 'label' => 'Phone', 'maxlength' => '14', 'type' => 'tel']);
                        echo $this->Form->control('customer_email', ['required', 'class' => 'form-control', 'label' => 'Email']);
=======
                        echo $this->Form->control('customer_phone', ["required", "class" => "form-control", "label" => "Phone", "maxlength" => "14", "type" => "tel", "placeholder" => "0xxxxxxxxx"]);
                        echo $this->Form->control('customer_email', ["required", "class" => "form-control", "label" => "Email", "placeholder" => "johndoe@mail.com"]);
>>>>>>> d318ba5ebccd4c68cc99ad7d2d3971e0170d991f
                        ?>
                    </div>
                    <div class="row mx-auto">
                        <p class="col-xs-6 phone_specific_error hide_default">Phone numbers must begin with 0, 61 or +61. Then remaining nine digits.</p>
                    </div>
                    <div class="hide_default">
                        <?php
                        echo $this->Form->control('allocation_id', ['options' => $allocation, 'empty' => true, 'class' => 'hide_default']);
                        echo $this->Form->control('status', ['required', 'class' => 'hide_default']);

                        ?>
                    </div>
                </div>

                <div class="section_JOB locked_section">

                    <h2>The Job...</h2>

                    <div class="row mx-auto">
                        <?php
<<<<<<< HEAD
                        echo $this->Form->control('moving_from', ['required', 'class' => 'form-control']);
                        echo $this->Form->control('moving_to', ['required', 'class' => 'form-control']);
=======
                        echo $this->Form->control('moving_from', ["required", "class" => "form-control", "placeholder" => "Location A"]);
                        echo $this->Form->control('moving_to', ["required", "class" => "form-control", "placeholder" => "Location B"]);
>>>>>>> d318ba5ebccd4c68cc99ad7d2d3971e0170d991f
                        ?>
                    </div>
                    <div class="row mx-auto input_wide">
                        <?php
<<<<<<< HEAD
                        echo $this->Form->control('list_of_item', ['required', 'class' => 'form-control input_wide col-md-12', 'label' => 'Items Being Moved', 'type' => 'textarea']);
=======
                        echo $this->Form->control('list_of_item', ["required", "class" => "form-control input_wide col-md-12", "label" => "Items Being Moved", "type" => "textarea", "placeholder" => "Item one\nItem two\nItem three..."]);
>>>>>>> d318ba5ebccd4c68cc99ad7d2d3971e0170d991f
                        ?>
                    </div>

                </div>

                <div class="section_TRUCK locked_section">

                    <h2>The Truck...</h2>

                    <div class="row mx-auto">
                        <?php
                        //echo $this->Form->control('size', ["class" => "form-control"]);


                        $truck_size_opts = ['2T' => 'Just a few items - (2T)', '4T' => '1-2 Bedrooms / Small Office - (4T)', '8T' => '3-4 Bedrooms / Medium Office - (8T)', '10T' => '4-5 Bedrooms / Medium Office - (10T)', '12T' => '4-5 Bedrooms / Large Office - (12T)'];
                        echo $this->Form->control('size', ['required', 'options' => $truck_size_opts, 'label' => 'How many items are we moving?',
                            'empty' => 'Choose...', 'selected' => 'Choose...', 'class' => 'form-control']);

                        ?>
                    </div>


                </div>

                <div class="section_WHEN locked_section">

                    <h2>When Suits?</h2>
                    <div class="row">
                        <div class="center mx-auto">
                            <div id='calendar'></div>
                        </div>
                    </div>
                    <br>
                    <div class="row mx-auto">
                        <div class="alert alert-warning text-center mx-auto" role="alert">
                            Make sure that the truck is NOT unavailable (red) on the date you choose!
                        </div>
                    </div>


                    <div class="row mx-auto">
                        <?php
                        echo $this->Form->control('date', ['required', 'class' => 'form-control text-center']);
                        ?>
                    </div>
                    <div class="row mx-auto">
                        <p class="col-xs-12 date_specific_error hide_default">You must choose a future date for the delivery to occur.</p>
                    </div>
                </div>
            </fieldset>


            <div id="invalid_form" class="no-review_section">
                <h2>Are you sure you're done?</h2>
                <p>Looks like some fields were left empty or entered incorrectly. Please scroll up.</p>
            </div>

            <div id="valid_form" class="mx-auto locked_section">

                <div class="review_section hide_this">
                    <h2>Does this all look correct?</h2>
                    <div class="row">
                        <p class="review_message wx-50"></p>
                    </div>
                    <br/>
                </div>


                <h2>Let's Do It!</h2>
                <div class="center">
                    <?= $this->Form->button(__('Submit Enquiry'), ['class' => 'btn btn-success', 'id' => 'submit_btn']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<!-- API Js -->
<?php
echo $this->Html->script('API/addressFinder');
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: '<?= $this->URL->build(['controller' => 'Jobs', 'action' => 'calendar', '_ext' => 'json']) ?>'
        });
        calendar.render();
    });
</script>

<!-- custom form validation front-end JS script by Darren -->
<?php
echo $this->Html->script('form_validation');
?>

</body>

</html>




