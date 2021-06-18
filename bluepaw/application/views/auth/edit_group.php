<?php $this->load->view('common/bootstrap'); ?>


<div class = 'container p-3 my-3 border'>
<h1><?php echo lang('edit_group_heading');?></h1>
<p><?php echo lang('edit_group_subheading');?></p>
</div>


<div id="infoMessage" class="alert-primary container"><?php echo $message;?></div>


<div class="container border p-3 my-3">
<?php echo form_open(current_url());?>

      <p>
            <?php echo lang('edit_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name, '', ['class' => 'form-control']);?>
      </p>

      <p>
            <?php echo lang('edit_group_desc_label', 'description');?> <br />
            <?php echo form_input($group_description, '', ['class' => 'form-control']);?>
      </p>

      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'), ['class' => 'btn btn-warning']);?></p>

<?php echo form_close();?>
</div>