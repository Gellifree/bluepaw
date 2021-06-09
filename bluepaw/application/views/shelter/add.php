<?php echo form_open(); ?>

<?php echo form_input
    (
        ['type' => 'text', 'name' => 'shelter_nev'],
        '',
        ['placeholder' => 'Menhely neve']
    ); 
?> <br/>

<?php echo form_textarea
    (
        ['name'=> 'shelter_leiras'],
        '',
        ['placeholder' => 'Menhely leírása']
    );
?> <br/>

<?php echo form_button
    (
        ['type' => 'submit', 'name' => 'mentes'],
        'Mentés'
    ); 
?>

<?php echo form_close(); ?>
