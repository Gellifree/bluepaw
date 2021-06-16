<?php $this->load->view('common/bootstrap'); ?>
<div class = 'container p-3 my-3 border'>
<h3><?php echo lang('login_heading');?></h3>
<p><?php echo lang('login_subheading');?></p>

<div class="alert-primary" id="infoMessage"><?php echo $message;?></div>
</div>

<div class="container p-3 my-3 bg-dark text-white">
<?php echo form_open("auth/login");?>

  <p>
    <!-- <?php echo lang('login_identity_label', 'identity');?> -->
    <?php echo form_input($identity, '',['Placeholder' => 'Username', 'class' => 'form-control']);?>
  </p>

  <p>
    <!--<?php echo lang('login_password_label', 'password');?>-->
    <?php echo form_input($password, '',['Placeholder' => 'Password', 'class' => 'form-control']);?>
  </p>

  <!--
  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>
-->

  <p><?php echo form_submit('submit', lang('login_submit_btn'), ['class' => 'btn btn-warning'] );?></p>

<?php echo form_close();?>


  <p><a class='font-weight-light' href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>
