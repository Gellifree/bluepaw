<?php $this->load->view('common/bootstrap'); ?>
<div class = 'container p-3 my-3 border'>


<?php echo form_error('nev'); ?>
<?php echo form_open(); ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'nev'],
        set_value('nev', ''),
        ['placeholder' => lang('office_name'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('kapacitas'); ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'kapacitas'],
        set_value('kapacitas', ''),
        ['placeholder' => lang('office_capacity'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('epulet'); ?>
<?php echo form_dropdown(
        ['name' => 'epulet', 'class' => 'btn btn-secondary'],
        $epulet);
?>

<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'),
        ['class' => 'btn btn-primary']);
?>
<?php echo form_close(); ?>
</div>