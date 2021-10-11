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
<html lang="en" style="background-color: lightyellow">
<body style="background-color: lightyellow">
<div class="row">
    <div class="column-responsive column-100">
        <body class="jobs view content">
        <hr class="sidebar-divider d-none d-md-block">
        <div class="row">
            <div class="col-md-auto">
                <h3 class="mb-3" style="color: black">Details for Job id : <?= h($job->id)?>  Size : <?= h($job->size)?>   Date : <?= h($job->date)?></h3>
                <form class="needs-validation" novalidate="">

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

                    <div>
                        <?php
                        if ($job->status == 0) {
                            $status = 'Enquiry';
                        } elseif ($job->status == 1) {
                            $status = 'Offer';
                        } elseif ($job->status == 2) {
                            $status = 'Job';
                        } elseif ($job->status == 3) {
                            $status = 'Picked_Up';
                        } elseif ($job->status == 4) {
                            $status = 'In-Transit';
                        } elseif ($job->status == 5) {
                            $status = 'Delivery';
                        } elseif ($job->status == 6) {
                            $status = 'Completed';
                        }
                        ?>
                        <p style="color: gray(5);font-size: 20px" >Status:</p>
                        <p style="color: black;font-size: 20px" ><?=h($status)?></p>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div>
                        <?php
                        if ($job->deposit_status == 0) {
                            $deposit_status = 'Waiting';
                        } elseif ($job->deposit_status == 1) {
                            $deposit_status = 'Confirmed';
                        }?>
                        <p style="color: gray(5);font-size: 20px" >Deposit Status:</p>
                        <p style="color: black;font-size: 20px" ><?=h($deposit_status)?></p>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                </form>
            </div>
            <div class="col-md-auto">
                <h3 class="mb-3" style="color: black">Allocation : </h3>
                <form class="needs-validation" novalidate="">

                    <hr class="sidebar-divider d-none d-md-block">
                    <?php if ($job->allocation != null) :?>
                        <div class="row">
                            <div class="col-md-auto mb-3">
                                <p style="color: gray(5);font-size: 20px" >Staff 1 Name:</p>
                                <p style="color: black;font-size: 20px" ><?= h($staff_name1)?></p>
                            </div>
                            <div class="col-md-auto mb-3">
                                <p style="color: gray(5);font-size: 20px" >Staff 2 Name:</p>
                                <p style="color: black;font-size: 20px" ><?= h($staff_name2)?></p>
                            </div>
                        </div>
                        <hr class="sidebar-divider d-none d-md-block">
                        <div>
                            <p style="color: gray(5);font-size: 20px" >Vehicle Rego:</p>
                            <p style="color: black;font-size: 20px" ><?= h($vehicle_rego)?></p>
                        </div>
                    <?php else :?>
                    <div class="col-md-6 mb-3">
                        <p style="color: gray(5);font-size: 20px" >Staff 1:</p>
                        <p style="color: black;font-size: 20px" >Waiting for Allocation</p>
                    </div>
                    <?php endif;?>

                    <hr class="sidebar-divider d-none d-md-block">
                </form>
                <h3 class="mb-3" style="color: black">Payment Detail : </h3>
                <hr class="sidebar-divider d-none d-md-block">
                <form>
                    <div class="mb-3">
                        <p style="color: gray(5);font-size: 20px" >Total Paid: ($)</p>
                        <p style="color: black;font-size: 20px" ><?= $this->Number->format($job->total_paid) ?></p>
                    </div>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="mb-3">
                        <p style="color: gray(5);font-size: 20px" >Total Remaining: ($)</p>
                        <p style="color: black;font-size: 20px" ><?= $this->Number->format($job->total_remaining) ?></p>
                    </div>
                </form>
                <hr class="sidebar-divider d-none d-md-block">
                <h3 class="mb-3" style="color: black">Feedback : </h3>
                <hr class="sidebar-divider d-none d-md-block">
                <?php if($job->feedback_stars != null):?>
                    <?php if($job->feedback_comment != null):?>
                        <form>
                            <div class="mb-3">
                                <p style="color: gray(5);font-size: 20px" >Feedback Star (5 Max):</p>
                                <p style="color: black;font-size: 20px" ><?= $this->Number->format($job->feedback_stars) ?></p>
                            </div>
                            <hr class="sidebar-divider d-none d-md-block">
                            <div class="mb-3">
                                <p style="color: gray(5);font-size: 20px" >Feedback Comments:</p>
                                <p style="color: black;font-size: 20px" ><?= h($job->feedback_comment) ?></p>
                            </div>
                        </form>
                    <?php else:?>
                        <form>
                            <div class="mb-3">
                                <p style="color: gray(5);font-size: 20px" >Feedback Star (5 Max):</p>
                                <p style="color: black;font-size: 20px" ><?= $this->Number->format($job->feedback_stars) ?></p>
                            </div>
                        </form>
                    <?php endif;?>
                <?php else:?>
                    <div class="mb-3">
                        <p style="color: black;font-size: 20px" >Waiting for Feedback</p>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-lg-auto">
                <h3 class="mb-3" style="color: black">Send Email To Customer </h3>
                <hr class="sidebar-divider d-none d-md-block">
                <?php
                    $recipient = $job->customer_email;
                    if ($job->status == 0) {
                        $subject = 'Enquiry has been accepted: ' . $job->date . ' for ' . $job->customer_first_name;
                        $message = 'Thank you for making an enquiry! It has been accepted'.PHP_EOL.
                        PHP_EOL.'Please transfer to the bank account below to make a deposit.'.PHP_EOL.
                        'Account Name: Easy Peasy Removal'.PHP_EOL.
                        'BSB: 000-000'.PHP_EOL.
                        'Account Number: 00000000'.PHP_EOL.
                        PHP_EOL.'Remain Amount: $'.$this->Number->format($job->total_remaining/10)
                    ;
                    } elseif ($job->status == 6) {
                        $subject = 'Job Completion Notification: ' . $job->date . ' for ' . $job->customer_first_name;
                        $message = 'Thank you! The Link below is for feedback.'.PHP_EOL.
                        'https://fit3047team102.u21s2102.monash-ie.me/jobs/review?id='.$job->id.PHP_EOL.
                        PHP_EOL.'Please transfer to the bank account below to make a payment.'.PHP_EOL.
                        'Account Name: Easy Peasy Removal'.PHP_EOL.
                        'BSB: 000-000'.PHP_EOL.
                        'Account Number: 00000000'.PHP_EOL.
                        PHP_EOL.'Remain Amount: $'.$this->Number->format($job->total_remaining)
                    ;
                    }else {
                        $subject = 'Job status update: ' . $job->date . ' for ' . $job->customer_first_name;
                        $message = 'Current status: '.PHP_EOL.
                        $status;
                    }
                    // $subject = 'Job Completion Notification: ' . $job->date . ' for ' . $job->customer_first_name;
                    // $message = 'Thank you! The Link below is for feedback.'.PHP_EOL.
                    // $this->Url->build(['controller' => 'Jobs', 'action' => 'Review', "?" => ["id" => $job->id], 'fullBase' => true]).PHP_EOL.
                    // PHP_EOL.'Please transfer to the bank account below to make a payment.'.PHP_EOL.
                    // 'Account Name: Easy Peasy Removel'.PHP_EOL.
                    // 'BSB: 000-000'.PHP_EOL.
                    // 'Account Number: 00000000'.PHP_EOL.
                    // PHP_EOL.'Remain Amount: '.$this->Number->format($job->total_remaining)
                    // ;
                ?>
                <?php
                if (isset($_POST['send'])) {
                    //access user entered data
                    $recipient = $_POST['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    $sender = 'From: gche0005@gmail.com';
                    //if user leave empty field among one of them
                    if (empty($recipient) || empty($subject)) {
                        ?>
                        <!-- display an alert message if one of them field is empty -->
                        <div class="alert alert-danger text-center">
                            <?php echo 'All inputs are required!' ?>
                        </div>
                        <?php
                    } else {
                        $mailer = new Mailer('default');
                        $mailer->setFrom(['joshgeng1116@gmail.com' => 'My Site'])
                            ->setTo($recipient)
                            ->setSubject($subject)
                            ->deliver($message);
                        ?>

                        <div class="alert alert-success text-center">
                            <?php echo "Your mail successfully sent to $recipient"?>
                        </div>
                        <?php
                        $recipient = $job->customer_email;
                        $subject = 'Job Completion Notification: ID ' . $job->id . '!';
                    }
                }?>
                <form method="post">
                    <div class="form-group">
                        <input class="form-control" name="email" type="email" placeholder="Recipients" value="<?php echo $recipient ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="subject" type="text" placeholder="Subject" value="<?php echo $subject?>">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control textarea" name="message"><?php echo $message?></textarea>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" style="background-color:#3CB371; color: white" type="submit" name="send" value="Send"/>
                    </div>
                </form>
            </div>
            <div class="col-md-auto">
                <h3 class="mb-3" style="color: black">Actions :</h3>
                <hr class="sidebar-divider d-none d-md-block">
                <a href="<?=$this->Url->build(['action' => 'index'])?>" class="form-control button" style="background-color: black;color: white"><i
                        class="fas fa-backward fa-sm text-white"></i> Back</a>
                <hr class="sidebar-divider d-none d-md-block">
                <a href="<?=$this->Url->build(['action' => 'edit', $job->id])?>" class="form-control button" style="background-color: #4169E1;color: white"><i
                        class="fas fa-edit fa-sm text-white"></i> Edit</a>
                <hr class="sidebar-divider d-none d-md-block">
                <a href="<?=$this->Url->build(['action' => 'delete', $job->id])?>" onclick="return confirm('Do you want to delete this job?')" class="form-control button" style="background-color: red;color: white"><i
                        class="fas fa-edit fa-sm text-white"></i> Delete</a>
        </div>
        </div>
    </div>
</body>
</html>

