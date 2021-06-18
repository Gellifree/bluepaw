<?php $this->load->view('common/bootstrap'); ?>
<div class = 'container p-3 my-3 border'>
<?php echo form_open(); ?>

<?php echo form_error('nev'); ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'nev'],
        set_value('nev', $record->nev),
        ['placeholder' => lang('responsibility_name'), 'class'=> 'form-control']);
?>
<br/>


<?php echo form_textarea(
        ['type' => 'text', 'name' => 'leiras'],
        set_value('leiras', $record->leiras),
        ['placeholder' => lang('description'), 'class'=> 'form-control']);
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