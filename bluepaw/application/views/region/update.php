<?php $this->load->view('common/bootstrap'); ?>
<title> <?php echo lang('edit') ?> </title>

<div class="container bg-dark p-3 text-white my-3 shadow-sm rounded">
    <?php echo lang('edit') ?>
</div>

<div class = 'container p-4 my-3 border'>

<?php echo form_open(); ?>

<?php echo form_error('nev') ?>
<?php echo form_input
    (
        ['type' => 'text', 'name' => 'nev', 'required' => 'required', 'minlength' => '3'],
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
        ['class' => 'btn btn-warning float-right']
    ); 
?>

<?php echo form_close(); ?>
</div>