<?php echo validation_errors(); ?>

<?php echo form_open(); ?>

<?php echo form_error('telep_nev') ?>
<?php echo form_input
    (
        ['type' => 'text', 'name' => 'telep_nev', 'required' => 'required', 'minlength' => 2],
        set_value('telep_nev', ''),
        ['placeholder' => lang('site_name')]
    ); 
?> <br/>

<?php echo form_textarea
    (
        ['name'=> 'telep_leiras'],
        set_value('telep_leiras', ''),
        ['placeholder' => lang('site_description')]
    );
?> <br/>

<?php echo form_button
    (
        ['type' => 'submit', 'name' => 'mentes'],
        lang('save')
    ); 
?>

<?php echo form_close(); ?>