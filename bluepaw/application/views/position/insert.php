<?php $this->load->view('common/bootstrap'); ?>
<title> <?php echo lang('add') ?> </title>
<div class = 'container p-3 my-3 border'>
<?php echo form_open(); ?>

<?php echo form_error('nev') ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'nev', 'required' => 'required', 'minlength' => '3'],
        set_value('nev', ''),
        ['placeholder' => lang('position_name'), 'class'=> 'form-control']);
?>
<br/>


<?php echo form_textarea(
        ['type' => 'text', 'name' => 'leiras'],
        set_value('leiras', ''),
        ['placeholder' => lang('description'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('fizetes'); ?>
<?php echo form_input(
        ['type' => 'number', 'name' => 'fizetes', 'required' => 'required'],
        set_value('fizetes', ''),
        ['placeholder' => lang('position_payment'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'),
        ['class' => 'btn btn-primary']
        );
?>
<?php echo form_close(); ?>

</div>