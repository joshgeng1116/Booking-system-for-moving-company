<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staffs
 */
?>

<div class="users form">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?php 
    $email = '';
    $password = '';
    ?>
    <input class="form-control" name="email" type="email" placeholder="Recipients" value="<?php echo $email ?>">
    <input class="form-control" name="email" type="email" placeholder="Recipients" value="<?php echo $password ?>">
    
    <?php 
        foreach($staffs as $staff){
            if($email == $staff->email_address && $password == $staff->password){
                return $staff->id;
            }
            else{
                return 'shit';
            }
        }
    ?>
</div>