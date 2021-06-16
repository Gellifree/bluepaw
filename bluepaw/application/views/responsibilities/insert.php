<?php echo form_open(); ?>

<?php echo form_input(['type' => 'text', 'name' => 'nev'], set_value('nev', ''), ['placeholder' => 'feladatkör neve']); ?>
<br/>


<?php echo form_textarea(['type' => 'text', 'name' => 'leiras'], set_value('leiras', ''), ['placeholder' => 'Leírás']); ?>
<br/>


<?php echo form_button(['type' => 'submit', 'name' => 'submit'], lang('save')); ?>
<?php echo form_close(); ?>