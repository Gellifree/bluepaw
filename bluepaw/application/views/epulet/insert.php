<?php echo form_open(); ?>

<?php echo form_error('nev'); ?>

<?php echo form_error('nev') ?>
<?php echo form_input(['type' => 'text', 'name' => 'nev'], set_value('nev', ''), ['placeholder' => lang('building_name')]); ?>
<br/>

<?php echo form_error('tipus'); ?>
<?php echo form_input(['type' => 'text', 'name' => 'tipus'], set_value('tipus', ''), ['placeholder' => lang('building_type')]); ?>
<br/>

<?php echo form_error('regio'); ?>
<?php echo form_dropdown(['name' => 'regio'], $regiok); ?> <br/>
<?php echo form_button(['type' => 'submit', 'name' => 'submit'], lang('save')); ?>
<?php echo form_close(); ?>