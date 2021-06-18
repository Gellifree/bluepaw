<?php $this->load->view('common/bootstrap'); ?>


<?php echo form_open(); ?>

<?php echo form_error('nev') ?>
<?php echo form_input
    (
        ['type' => 'text', 'name' => 'nev', 'required' => 'required', 'minlength' => 2],
        set_value('nev', $record->nev),
        ['placeholder' => lang('region_name')]
    ); 
?> <br/>

<?php echo form_textarea
    (
        ['name'=> 'leiras'],
        set_value('leiras', $record->leiras),
        ['placeholder' => lang('description')]
    );
?> <br/>

<?php echo form_button
    (
        ['type' => 'submit', 'name' => 'mentes'],
        lang('save')
    ); 
?>

<?php echo form_close(); ?>