<?php echo validation_errors(); ?>

<?php echo form_open(); ?>

<?php echo form_error('region_nev') ?>
<?php echo form_input
    (
        ['type' => 'text', 'name' => 'region_nev', 'required' => 'required', 'minlength' => 2],
        set_value('region_nev', ''),
        ['placeholder' => 'Régió neve']
    ); 
?> <br/>

<?php echo form_textarea
    (
        ['name'=> 'region_leiras'],
        set_value('region_leiras', ''),
        ['placeholder' => 'Régió leírása']
    );
?> <br/>

<?php echo form_button
    (
        ['type' => 'submit', 'name' => 'mentes'],
        lang('save')
    ); 
?>

<?php echo form_close(); ?>