<?php $this->load->view('common/bootstrap'); ?>
<div class = 'container p-3 my-3 border'>

<?php echo form_open(); ?>

<?php echo form_error('nev') ?>
<?php echo form_input
    (
        ['type' => 'text', 'name' => 'nev', 'required' => 'required', 'minlength' => 2],
        set_value('nev', $record->nev),
        ['placeholder' => lang('region_name'), 'class'=> 'form-control']
    ); 
?> <br/>

<?php echo form_textarea
    (
        ['name'=> 'leiras'],
        set_value('leiras', $record->leiras),
        ['placeholder' => lang('description'), 'class'=> 'form-control']
    );
?> <br/>

<?php echo form_button
    (
        ['type' => 'submit', 'name' => 'mentes'],
        lang('save'),
        ['class' => 'btn btn-primary']
    ); 
?>

<?php echo form_close(); ?>
</div>