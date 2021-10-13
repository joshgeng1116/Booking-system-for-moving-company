<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staffs
 */
$this->disableAutoLayout();
echo $this->Html->css('login');
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown" style="background-color:black;">
  <div id="formContent" style="background-color:#f5c71a;">
    <div class="fadeIn first">
      <h1>Login For Easy Peasy Removal Staffs</h1>
    </div>
    <form class='form-group col' method='post'>
        <div class='col-xs-1'>
            <p style="color: gray(5);font-size: 20px" >Email:</p>
            <input class="form-control" name="email" type="email" placeholder="email" value="<?php echo $email ?>"/>
        </div>
        <div class='col-xs-1'>
            <p style="color: gray(5);font-size: 20px" >Password:</p>
            <input class="form-control" name="password" type="password" placeholder="password" value="<?php echo $password ?>"/>
        </div>
        <hr class="sidebar-divider d-none d-md-block">
        <input type="submit" name="login" style="background-color:#3CB371; color: white" type="submit" class="fadeIn fourth" value="Login">
    </form>
      <div id="formFooter">
          <a href="<?= $this->Url->build(['action' => 'sendResetEmail'])?>" class="underlineHover">Forgot Password?</a>
      </div>
  </div>
</div>
