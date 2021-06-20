<?php $this->load->view('common/bootstrap'); ?>
<title> <?php echo lang('add') ?> </title>

<div class="container bg-dark p-3 text-white my-3 shadow-sm rounded">
    <?php echo lang('add') ?>
</div>


<div class = 'container p-4 my-3 border'>
<?php echo form_open(); ?>

<?php echo form_error('nev') ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'nev', 'required' => 'required', 'minlength' => '3'],
        set_value('nev', ''),
        ['placeholder' => lang('responsibility_name'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('leiras') ?>
<?php echo form_textarea(
        ['type' => 'text', 'name' => 'leiras'],
        set_value('leiras', ''),
        ['placeholder' => lang('description'), 'class'=> 'form-control']);
?>
<br/>


<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'),
        ['class' => 'btn btn-warning float-right']
        );
?>
<?php echo form_close(); ?>
</div>