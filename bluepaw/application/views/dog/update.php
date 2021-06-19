<?php $this->load->view('common/bootstrap'); ?>
<div class = 'container p-3 my-3 border'>
<?php echo form_open(); ?>

<?php echo form_error('nev'); ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'nev'],
        set_value('nev', $record->nev),
        ['placeholder' => lang('dog_name'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('leiras'); ?>
<?php echo form_textarea(
        ['type' => 'text', 'name' => 'leiras'],
        set_value('leiras', $record->leiras),
        ['placeholder' => lang('description'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('epulet'); ?>
<?php echo form_dropdown(
        ['name' => 'epulet', 'class' => 'btn btn-secondary'],
        $buildings,
        [$record->epulet]
        );
?>

<?php echo form_dropdown(
        ['name' => 'nem', 'class' => 'btn btn-secondary'],
        ['Fiú'=>'Fiú','Lány' => 'Lány'],
        [$record->nem]
        );
?>

<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'),
        ['class' => 'btn btn-primary']
        );
?>
<?php echo form_close(); ?>
</div>