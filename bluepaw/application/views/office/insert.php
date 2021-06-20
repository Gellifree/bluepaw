<?php $this->load->view('common/bootstrap'); ?>

<title> <?php echo lang('add') ?> </title>

<div class="container bg-dark p-3 text-white my-3 shadow-sm rounded">
    <?php echo lang('add') ?>
</div>

<div class = 'container p-3 my-3 border'>


<?php echo form_error('nev'); ?>
<?php echo form_open(); ?>
<?php echo form_input(
        ['type' => 'text', 'name' => 'nev', 'required' => 'required', 'minlength' => '3'],
        set_value('nev', ''),
        ['placeholder' => lang('office_name'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('kapacitas'); ?>
<?php echo form_input(
        ['type' => 'number', 'name' => 'kapacitas', 'required' => 'required'],
        set_value('kapacitas', ''),
        ['placeholder' => lang('office_capacity'), 'class'=> 'form-control']);
?>
<br/>

<?php echo form_error('epulet'); ?>
<?php echo form_dropdown(
        ['name' => 'epulet', 'class' => 'btn btn-secondary'],
        $epulet);
?>

<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'),
        ['class' => 'btn btn-warning float-right']);
?>
<?php echo form_close(); ?>
</div>

<img src="/bluepaw/public/img/secondary_logo.png" width="180px" class="mx-auto d-block m-3" style="-webkit-filter: grayscale(100%); opacity: 50%;"/>
<?php $this->load->view('common/footer'); ?>