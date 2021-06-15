<?php echo form_open(); ?>

<?php echo form_error('megnevezes'); ?>

<?php echo form_input(['type' => 'text', 'name' => 'megnevezes'], set_value('megnevezes', ''), ['placeholder' => lang('building_name')]); ?>
<br/>
<?php echo form_error('tipus'); ?>
<?php echo form_input(['type' => 'text', 'name' => 'tipus'], set_value('tipus', ''), ['placeholder' => lang('building_type')]); ?>
<br/>
<?php echo form_error('telep'); ?>
<?php echo form_dropdown(['name' => 'telep'], $telepek); ?> <br/>
<?php echo form_button(['type' => 'submit', 'name' => 'submit'], lang('save')); ?>
<?php echo form_close(); ?>