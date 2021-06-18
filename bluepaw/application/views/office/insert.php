<?php $this->load->view('common/bootstrap'); ?>

<?php echo form_open(); ?>

<?php echo form_error('nev'); ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'nev'],
        set_value('nev', ''),
        ['placeholder' => lang('office_name')]);
?>
<br/>

<?php echo form_error('kapacitas'); ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'kapacitas'],
        set_value('kapacitas', ''),
        ['placeholder' => lang('office_capacity')]);
?>
<br/>

<?php echo form_error('epulet'); ?>
<?php echo form_dropdown(
        ['name' => 'epulet'],
        $epulet);
?>

<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'));
?>
<?php echo form_close(); ?>