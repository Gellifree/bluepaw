<?php $this->load->view('common/bootstrap'); ?>


<div class = 'container p-3 my-3 border'>
<h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->{$identity}); ?></p>
</div>


<div class="container border p-3 my-3">
<?php echo form_open("auth/deactivate/".$user->id);?>

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(['id' => $user->id]); ?>

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'), ['class' => 'btn btn-warning']);?></p>

<?php echo form_close();?>
</div>