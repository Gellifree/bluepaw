<?php $this->load->view('common/bootstrap'); ?>


<div class = 'container p-3 my-3 border'>
<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
</div>


<div id="infoMessage" class="alert-primary container"><?php echo $message;?></div>


<div class="container border p-3 my-3">
<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity, '', ['class' => 'form-control']);?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'), ['class' => 'btn btn-warning']);?></p>

<?php echo form_close();?>
</div>
