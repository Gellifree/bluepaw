<?php $this->load->view('common/bootstrap'); ?>

<div class = 'container p-3 my-3 border'>
<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>
</div>


<div id="infoMessage" class="alert-primary container"><?php echo $message;?></div>


<div class="container border p-3 my-3">
<?php echo form_open("auth/create_user");?>

      <p>
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name, '', ['class' => 'form-control']);?>
      </p>

      <p>
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name, '', ['class' => 'form-control']);?>
      </p>
      
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity, '', ['class' => 'form-control']);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company, '', ['class' => 'form-control']);?>
      </p>

      <p>
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email, '', ['class' => 'form-control']);?>
      </p>

      <p>
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone, '', ['class' => 'form-control']);?>
      </p>

      <p>
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password, '', ['class' => 'form-control']);?>
      </p>

      <p>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm, '', ['class' => 'form-control']);?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'), ['class' => 'btn btn-warning']);?></p>

<?php echo form_close();?>
</div>