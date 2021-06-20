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
        ['placeholder' => lang('employee_name'), 'class' => 'form-control']);
?>
<br/>

<?php echo form_error('iroda'); ?>
<?php echo form_dropdown(
        ['name' => 'iroda', 'class' => 'btn btn-secondary'],
        $offices,
        [$record->iroda]
        );
?>
<?php echo form_error('munkakor'); ?>
<?php echo form_dropdown(
        ['name' => 'munkakor', 'class' => 'btn btn-secondary'],
        $positions,
        [$record->munkakor]
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

<img src="/bluepaw/public/img/secondary_logo.png" width="180px" class="mx-auto d-block m-3" style="-webkit-filter: grayscale(100%); opacity: 50%;"/>
<?php $this->load->view('common/footer'); ?>