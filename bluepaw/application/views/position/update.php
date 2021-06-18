<?php $this->load->view('common/bootstrap'); ?>

<?php echo form_open(); ?>

<?php echo form_input(
        ['type' => 'text', 'name' => 'nev'],
        set_value('nev', $record->nev),
        ['placeholder' => lang('position_name')]);
?>
<br/>


<?php echo form_textarea(
        ['type' => 'text', 'name' => 'leiras'],
        set_value('leiras', $record->leiras),
        ['placeholder' => lang('description')]);
?>
<br/>

<?php echo form_input(
        ['type' => 'number', 'name' => 'fizetes'],
        set_value('fizetes', $record->fizetes),
        ['placeholder' => lang('position_payment')]);
?>


<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'));
?>
<?php echo form_close(); ?>

