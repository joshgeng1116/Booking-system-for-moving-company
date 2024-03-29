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
echo $this->Html->css('jobs_success.css')
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
            <li class="nav-item">
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

        <h1>We'll be in touch</h1>

        <!--        <h2>From here...</h2>-->

        <div class="steps_wrapper">

            <div class="success_step">
                <i class="fas fa-file-signature success_icon"></i>
                <h3 class="success_explanation">We'll email you the total job price including the 10% required deposit. Please pay the deposit and
                    sign
                    the attached contract.</h3>
            </div>

            <div class="success_step">
                <i class="fas fa-truck success_icon"></i>
                <h3 class="success_explanation">The move will occur on the date agreed.</h3>
            </div>

            <div class="success_step">
                <i class="fas fa-money-bill-wave success_icon"></i>
                <h3 class="success_explanation">After the move is finished, we will accept payment on the spot or via a bank transfer within two
                    weeks of job completion.</h3>
            </div>

            <div class="success_step">
                <i class="far fa-smile success_icon"></i>
                <h3 class="success_explanation">Finally, give us some feedback afterwards if you please.</h3>
            </div>
            <br/>

            <?=

            $this->Html->Link('Return Home',

                ['controller' => 'Pages', 'action' => 'home', '_full' => true, 'class' => "btn btn-success"]
            );

            ?>
        </div>
        <br/>
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

</body>

</html>




