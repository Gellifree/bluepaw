<?php $this->load->view('common/bootstrap'); ?>
<title> <?php echo lang('edit') ?> </title>

<div class="container bg-dark p-3 text-white my-3 shadow-sm rounded">
    <?php echo lang('edit') ?>
</div>

<div class = 'container p-3 my-3 border'>
<?php echo form_open(); ?>

<?php echo form_error('nev'); ?>

<?php echo form_input(
        ['type' => 'text', 'name' => 'nev', 'required' => 'required', 'minlength' => '3'],
        set_value('nev', $record->nev),
        ['placeholder' => lang('office_name'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('kapacitas'); ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'kapacitas', 'required' => 'required'],
        set_value('kapacitas', $record->kapacitas),
        ['placeholder' => lang('office_capacity'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('epulet'); ?>
<?php echo form_dropdown(
        ['name' => 'epulet', 'class' => 'btn btn-secondary'],
        $epuletek,
        [$record->epulet]
        );
?>

<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'),
        ['class' => 'btn btn-warning float-right']
        );
?>
<?php echo form_close(); ?>
</div>