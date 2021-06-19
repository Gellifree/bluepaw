<?php $this->load->view('common/bootstrap'); ?>
<div class = 'container p-3 my-3 border'>
<?php echo form_open(); ?>

<?php echo form_error('nev'); ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'nev', 'required' => 'required', 'minlength' => '3'],
        set_value('nev', ''),
        ['placeholder' => lang('building_name'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('leiras'); ?>
<?php echo form_textarea(
        ['type' => 'text', 'name' => 'leiras'],
        set_value('leiras', ''),
        ['placeholder' => lang('description') , 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('regio'); ?>
<?php echo form_dropdown(
        ['name' => 'regio', 'class' => 'btn btn-secondary'],
        $regiok);
?>

<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'),
        ['class'=>'btn btn-warning']);
?>
<?php echo form_close(); ?>
</div>