<?php $this->load->view('common/bootstrap'); ?>
<title> <?php echo lang('edit') ?> </title>

<div class="container bg-dark p-3 text-white my-3 shadow-sm rounded">
    <?php echo lang('edit') ?>
</div>

<div class = 'container p-4 my-3 border'>
<?php echo form_open(); ?>

<?php echo form_input(
        ['type' => 'text', 'name' => 'nev', 'required' => 'required', 'minlength' => '3'],
        set_value('nev', $record->nev),
        ['placeholder' => lang('position_name'), 'class'=> 'form-control']);
?>
<br/>


<?php echo form_textarea(
        ['type' => 'text', 'name' => 'leiras'],
        set_value('leiras', $record->leiras),
        ['placeholder' => lang('description'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('fizetes'); ?>
<?php echo form_input(
        ['type' => 'number', 'name' => 'fizetes', 'required' => 'required'],
        set_value('fizetes', $record->fizetes),
        ['placeholder' => lang('position_payment'), 'class'=> 'form-control']);
?>

<br/>
<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'),
        ['class' => 'btn btn-warning float-right p3']
        );
?>
<?php echo form_close(); ?>
</div>


<img src="/bluepaw/public/img/secondary_logo.png" width="180px" class="mx-auto d-block m-3" style="-webkit-filter: grayscale(100%); opacity: 50%;"/>
