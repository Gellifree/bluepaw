<?php $this->load->view('common/bootstrap'); ?>

<title> <?php echo lang('add') ?> </title>

<div class="container bg-dark p-3 text-white my-3 shadow-sm rounded">
    <?php echo lang('add') ?>
</div>
<div class = 'container p-3 my-3 border'>
<?php echo form_open(); ?>

<?php echo form_error('munkakor'); ?>
<?php echo form_dropdown(
        ['name' => 'munkakor', 'class' => 'btn btn-secondary'],
        $positions);
?>
    
<?php echo form_error('feladatkor'); ?>
<?php echo form_dropdown(
        ['name' => 'feladatkor', 'class' => 'btn btn-secondary'],
        $responsibilities);
?>

<?php echo form_button(
        ['type' => 'submit', 'name' => 'submit'],
        lang('save'),
        ['class'=>'btn btn-warning float-right']);
?>
<?php echo form_close(); ?>
</div>

<img src="/bluepaw/public/img/secondary_logo.png" width="180px" class="mx-auto d-block m-3" style="-webkit-filter: grayscale(100%); opacity: 50%;"/>
<?php $this->load->view('common/footer'); ?>