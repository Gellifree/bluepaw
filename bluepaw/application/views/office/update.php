<?php $this->load->view('common/bootstrap'); ?>

<?php echo form_open(); ?>

<?php echo form_error('nev'); ?>

<?php echo form_input(['type' => 'text', 'name' => 'nev'], set_value('nev', $record->nev), ['placeholder' => 'Iroda neve']); ?>
<br/>

<?php echo form_error('leiras'); ?>
<?php echo form_input(['type' => 'text', 'name' => 'kapacitas'], set_value('kapacitas', $record->kapacitas), ['placeholder' => 'Kapacitás']); ?>
<br/>


<?php echo form_dropdown(['name' => 'epulet'], $epuletek); ?>

<?php echo form_button(['type' => 'submit', 'name' => 'submit'], lang('save')); ?>
<?php echo form_close(); ?>
