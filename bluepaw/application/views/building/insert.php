<?php echo form_open(); ?>

<?php echo form_error('nev'); ?>

<?php echo form_input(['type' => 'text', 'name' => 'nev'], set_value('nev', ''), ['placeholder' => 'Épület neve']); ?>
<br/>

<?php echo form_error('leiras'); ?>
<?php echo form_textarea(['type' => 'text', 'name' => 'leiras'], set_value('leiras', ''), ['placeholder' => 'Leírás']); ?>
<br/>

<?php echo form_error('telep'); ?>
<?php echo form_dropdown(['name' => 'regio'], $regiok); ?> <br/>
<?php echo form_button(['type' => 'submit', 'name' => 'submit'], lang('save')); ?>
<?php echo form_close(); ?>