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
<div class="jobs index content">
    <div>
        </br>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= __('My Jobs For Today') ?></h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= h('Customer First Name') ?></th>
                <th><?= h('Customer Last Name') ?></th>
                <th><?= h('Customer Phone') ?></th>
                <th><?= h('Customer Email') ?></th>
                <th><?= h('Status') ?></th>
                <th><?= h('Moving From') ?></th>
                <th><?= h('Moving To') ?></th>
                <th><?= h('List of Item') ?></th>
                <th><?= h('Size') ?></th>
                <th><?= h('Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($jobs as $job): ?>
                    <?php if ($job->date == $time):?>
                        <?php if ($job->allocation->staff_member1_id == $staff_id || $job->allocation->staff_member2_id == $staff_id) :?>
                            <tr>
                                <td><?= h($job->customer_first_name) ?></td>
                                <td><?= h($job->customer_last_name) ?></td>
                                <td><?= h($job->customer_phone) ?></td>
                                <td><?= h($job->customer_email) ?></td>
                                <td>
                                    <?php if($job->status == 0):?>
                                        Enquiry
                                    <?php elseif($job->status == 1):?>
                                        Offer
                                    <?php elseif($job->status == 2):?>
                                        Job
                                    <?php elseif($job->status == 3):?>
                                        Picked-Up
                                    <?php elseif($job->status == 4):?>
                                        In-Transit
                                    <?php elseif($job->status == 5):?>
                                        Delivery
                                    <?php elseif($job->status == 6):?>
                                        Completed
                                    <?php endif;?>
                                </td>
                                <td><?= h($job->moving_from) ?></td>
                                <td><?= h($job->moving_to) ?></td>
                                <td><?= h($job->list_of_item) ?></td>
                                <td><?= h($job->size) ?></td>
                                <td><?= h($job->date) ?></td>
                                <td class="Actions">
                                    <?= $this->Html->link(__('Edit'), ['action' => 'editdriver', '?'=>['id'=>$job->id,'staff_id'=>$staff_id]]) ?>
                                </td>
                            </tr>
                            <?php else:?>
                                <h2>Take the Day Off</h2>
                                <h3>(No Jobs for today)</h3>
                        <?php endif;?>
                    <?php endif;?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
        <script>
            $( function() {
            $( ".datepicker" ).datepicker({dateFormat:'yy-mm-dd'});
        } );
    </script>
</div>
</body>