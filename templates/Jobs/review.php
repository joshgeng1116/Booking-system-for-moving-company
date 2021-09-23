<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 * @var \Cake\Collection\CollectionInterface|string[] $allocation
 */

$this->disableAutoLayout();

use Cake\Validation\Validator;

?>

<?php
$this->disableAutoLayout();
echo $this->Html->css('main.min');
echo $this->Html->css('validation.css');
echo $this->Html->script('main.min');
echo $this->Html->css('review.css')
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

                <h1>how'd the move go?</h1>

                <h2>Give Us A Rating</h2>
                <div class="row stars_row">
                    <div class="stars">
                        <i class="far fa-lg fa-star" id="1"></i>
                        <i class="far fa-lg fa-star" id="2"></i>
                        <i class="far fa-lg fa-star" id="3"></i>
                        <i class="far fa-lg fa-star" id="4"></i>
                        <i class="far fa-lg fa-star" id="5"></i>
                    </div>
                </div>

                <div class="hide_default">
                    <br/>
                    <?php
                    echo $this->Form->radio('feedback_stars',
                        [
                            ['value' => '1', 'text' => ''],
                            ['value' => '2', 'text' => ''],
                            ['value' => '3', 'text' => ''],
                            ['value' => '4', 'text' => ''],
                            ['value' => '5', 'text' => '']
                        ]);
                    ?>
                </div>

                <div class="feedback_text_section hide">

                    <h2 id="feedback_question">What can we do better?</h2>
                    <?php
                    echo $this->Form->control('feedback_comment', ['class' => 'form-control', 'maxlength' => '255']);
                    ?>

                </div>


            </fieldset>
            </br/>

            <div class="center lock submit_section">
                <?= $this->Form->button(__('Submit Review'), ["class" => "btn btn-success", "id" => "submit_btn"]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</div>

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
            events: '<?= $this->URL->build(['controller' => 'allocation', 'action' => 'calendar', '_ext' => 'json']) ?>'
        });
        calendar.render();
    });
</script>

<!-- custom form validation front-end JS script by Darren -->
<?php
echo $this->Html->script('review_validation');
?>

<!-- TODO embed this in its own JS file, wasn't working that's why in HTML -->
<script>
    let only_need_rating = true;
    $stars = $(".stars");
    console.log($stars);

    $stars.click(function (event) {
        /*
        console.log(event.target);
        $clicked_star = $(event.target)[0];
        console.log($clicked_star);
        $clicked_star.classList.remove("far");
        $clicked_star.classList.add("fas");

         */

        console.log(event.target.id);
        star_no = event.target.id;
        const stars = document.getElementsByClassName("stars");
        const feedback_text_section = document.getElementsByClassName("feedback_text_section");
        console.log(feedback_text_section);


        // to fill in stars
        for (let i = 0; i < star_no; i++) {
            console.log("star " + i + " will be filled.");
            let current_star = document.getElementsByClassName("fa-star")[i];
            current_star.classList.remove("far");
            current_star.classList.add("fas");
        }

        // to remove fill from remaining stars
        for (let i = star_no; i < document.getElementsByClassName("fa-star").length; i++) {
            let current_star = document.getElementsByClassName("fa-star")[i];
            current_star.classList.remove("fas");
            current_star.classList.add("far");
        }

        // Check the corresponding radio button for the review score
        radiobtn = document.getElementById("feedback-stars-" + star_no);
        console.log("Radio button:");
        console.log(radiobtn);
        radiobtn.checked = true;

        // Allow a comment if the feedback score was less than 2 (stars)
        if (star_no <= 2) {

            stars[0].classList.remove("stars_happy");
            stars[0].classList.add("stars_sad");

            only_need_rating = false;

            document.getElementById("feedback-comment").innerHTML = "";


            feedback_text_section[0].classList.remove("hide");


            let plural = true;

            if (star_no == 1) {
                plural = false;
            }

            // Show feedback field
            if (plural) {
                document.getElementById("feedback_question").innerHTML = "Only two stars out of five! How can we improve?";
            } else {
                document.getElementById("feedback_question").innerHTML = "Only one star out of five! How can we improve?";
            }

            document.getElementsByClassName("submit_section")[0].classList.add("lock");


        } else {

            stars[0].classList.remove("stars_sad");
            stars[0].classList.add("stars_happy");

            only_need_rating = true;


            // Hide feedback field
            feedback_text_section[0].classList.add("hide");

            // Set input of feedback field to (customer rated 3+ stars, not necessary)
            document.getElementById("feedback-comment").innerHTML = "N/A";

            document.getElementsByClassName("submit_section")[0].classList.remove("lock");

        }

    })

</script>

<style>
    .hide {
        transition: 0.3s ease-in !important;
        display: none;
    }

    .stars_row {
        display: flex !important;
        justify-content: center !important;
    }

    .fa-star:hover {

        cursor: pointer;

    }

    .stars_happy {
        color: #5cb85c !important;
    }

    .stars_sad {
        color: red !important;
    }


    .lock {
        opacity: 0.3 !important;
        pointer-events: none;
        user-select: none;
    }

    .submit_section {
        transition: 0.4s ease-out !important;
    }

</style>


</body>

</html>


