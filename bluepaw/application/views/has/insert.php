<?php $this->load->view('common/bootstrap'); ?>

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