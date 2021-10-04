<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Job $job
 * @var \App\Model\Entity\Staff[]|\Cake\Collection\CollectionInterface $staffs
 * @var \Cake\Collection\CollectionInterface|string[] $staffs
 * @var \Cake\Collection\CollectionInterface|string[] $vehicles
 */
?>
<html lang="en">
<div class="row">
<!--    <aside class="column">-->
<!--        <div class="side-nav">-->
<!--            <h4 class="heading">--><?php //= __('Actions') ?><!--</h4>-->
<!--            --><?php //= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
<!--            --><?php //= $this->Html->link(__('New Job'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
<!--        </div>-->
<!--    </aside>-->
    <div class="column-responsive column-80">
        <body class="jobs view content">
        <div class="row">
            <div class="col-md-7 order-md-1">
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
                            <p style="color: gray(5);font-size: 20px" >Customer's Email:</p>
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
            <div class="col-md-4 order-md-2 mb-4">
                <h3 class="mb-3" style="color: black">Allocation : </h3>
                <form class="needs-validation" novalidate="">

                    <hr class="sidebar-divider d-none d-md-block">

                    <?php foreach ($staffs as $staff) :?>
                        <?php if ($staff->id == $job->allocation->staff_member1_id) :?>
                            <?php $staff_name = '';
                            $staff_name = $staff->first_name?>
                        <?php endif;?>
                    <?php endforeach;?>
                    <div class="row">
                        <?php if ($job->allocation != null) :?>
                            <div class="col-md-6 mb-3">
                                <p style="color: gray(5);font-size: 20px" >Staff 1:</p>
                                <p style="color: black;font-size: 20px" ><?= h($staff_name)?></p>
                            </div>
                        <?php else :?>
                        <div class="col-md-6 mb-3">
                            <p style="color: gray(5);font-size: 20px" >Staff 1:</p>
                            <p style="color: black;font-size: 20px" >Waiting for Allocation</p>
                        </div>
                        <?php endif;?>
                    </div>

                    <hr class="sidebar-divider d-none d-md-block">

                    <div class="mb-3">
                        <p style="color: gray(5);font-size: 20px" >Customer's Email:</p>
                        <p style="color: black;font-size: 20px" ><?= h($job->customer_email) ?></p>
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
        </div>
            <table>
                <tr>
                    <th><?= __('Allocation') ?></th>
                    <td><?= $job->has('allocation') ? $this->Html->link($job->allocation->id, ['controller' => 'Allocation', 'action' => 'view', $job->allocation->id]) : '' ?></td>
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

        </div>
    </div>
</html>
