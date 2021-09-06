<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="jobs view content">
            <h3><?= h($job->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer First Name') ?></th>
                    <td><?= h($job->customer_first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Last Name') ?></th>
                    <td><?= h($job->customer_last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Email') ?></th>
                    <td><?= h($job->customer_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Allocation') ?></th>
                    <td><?= $job->has('allocation') ? $this->Html->link($job->allocation->id, ['controller' => 'Allocation', 'action' => 'view', $job->allocation->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td>
                        <?php if($job->status == 1):?>
                            Enquiry
                        <?php elseif($job->status == 2):?>
                            Offer
                        <?php elseif($job->status == 3):?>
                            Job
                        <?php elseif($job->status == 4):?>
                            Picked_Up
                        <?php elseif($job->status == 5):?>
                            In-Transit
                        <?php elseif($job->status == 6):?>
                            Delivery
                        <?php elseif($job->status == 7):?>
                            Completed
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Moving From') ?></th>
                    <td><?= h($job->moving_from) ?></td>
                </tr>
                <tr>
                    <th><?= __('Moving To') ?></th>
                    <td><?= h($job->moving_to) ?></td>
                </tr>
                <tr>
                    <th><?= __('List Of Item') ?></th>
                    <td><?= h($job->list_of_item) ?></td>
                </tr>
                <tr>
                    <th><?= __('Size') ?></th>
                    <td><?= h($job->size) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deposit Status') ?></th>
                    <td>
                        <?php if($job->deposit_status == 1):?>
                            Waiting
                        <?php elseif($job->deposit_status == 2):?>
                            Confirmed
                        <?php endif;?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($job->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer Phone') ?></th>
                    <td><?= h($job->customer_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Paid') ?></th>
                    <td><?= $this->Number->format($job->total_paid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Remaining') ?></th>
                    <td><?= $this->Number->format($job->total_remaining) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($job->date) ?></td>
                </tr>
            </table>
            <br><br>
            <center>
                <h4 class="sent-notification"></h4>
                <form id="myForm">
                    <h2>Send an Email</h2>

                    <label>Name</label>
                    <input id="name" type="text" placeholder="Enter Name">
                    <br><br>
                    <label>Email</label>
                    <input id="email" type="text" placeholder="Enter Email">
                    <br><br>
                    <label>Subject</label>
                    <input id="subject" type="text" placeholder="Enter Subject">
                    <br><br>
                    <label>Message</label>
                    <input id="body" rows="5" placeholder="Type Message"></Textarea>
                    <br><br>
                    <button type="button" onclick="sendEmail()" value="Send to customer">Submit</button>
                </form>
                <center>
                    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

                    <script type="text/javascript">
                        function sendEmail(){
                            var name = $('#name');
                            var email = $('#email');
                            var subject = $('#subject');
                            var body = $('#body');

                            if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
                                $.ajax({
                                    url:'SendEmail.php',
                                    method: 'POST',
                                    dataTypr: 'json',
                                    data:{
                                        name: name.val(),
                                        email: email.val(),
                                        subject: subject.val(),
                                        body: body.val()
                                    },success: function(response){
                                        $('#myForm')[0].reset();
                                        $('sent-notification').text("Message sent successfully.");
                                    }
                                });
                            }
                        }
                        function isNotEmpty(caller){
                            if(call.val()==""){
                                caller.css('border','1px solid red')
                                return false;
                            }
                            else{
                                caller.css('border','');
                                return true;
                            }
                        }
                    </script>
        </div>
    </div>
</div>
