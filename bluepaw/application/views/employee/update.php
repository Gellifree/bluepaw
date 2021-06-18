<?php $this->load->view('common/bootstrap'); ?>

<?php echo form_open(); ?>

<?php echo form_error('nev'); ?>

<?php echo form_input(
        ['type' => 'text', 'name' => 'nev'],
        set_value('nev', $record->nev),
        ['placeholder' => lang('employee_name')]);
?>
<br/>


<?php echo form_dropdown(
        ['name' => 'iroda'],
        $offices);
?>
<?php echo form_dropdown(
        ['name' => 'munkakor'],
        $positions);
?>



<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'));
?>
<?php echo form_close(); ?>