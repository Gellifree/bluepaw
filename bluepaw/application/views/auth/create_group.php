<?php $this->load->view('common/bootstrap'); ?>

<div class = 'container p-3 my-3 border'>
<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p>
</div>

<div id="infoMessage" class="alert-primary container"><?php echo $message;?></div>


<div class="container border p-3 my-3">
<?php echo form_open("auth/create_group");?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name, '', ['class' => 'form-control']);?>
      </p>

      <p>
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description, '', ['class' => 'form-control']);?>
      </p>

      <p><?php echo form_submit('submit', lang('create_group_submit_btn'), ['class' => 'btn btn-warning']);?></p>

<?php echo form_close();?>
</div>