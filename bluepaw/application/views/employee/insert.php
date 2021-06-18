<?php $this->load->view('common/bootstrap'); ?>
<div class = 'container p-3 my-3 border'>
<?php echo form_open(); ?>

<?php echo form_error('nev'); ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'nev'],
        set_value('nev', ''),
        ['placeholder' => lang('employee_name'), 'class' => 'form-control']);
?>
<br/>

<?php echo form_error('iroda'); ?>
<?php echo form_dropdown(
        ['name' => 'iroda', 'class' => 'btn btn-secondary'],
        $offices);
?>

<?php echo form_error('munkakor'); ?>
<?php echo form_dropdown(
        ['name' => 'munkakor', 'class' => 'btn btn-secondary'],
        $positions);
?>



<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'),
        ['class' => 'btn btn-primary']
        );
?>
<?php echo form_close(); ?>
</div>