<?php $this->load->view('common/bootstrap'); ?>

<title> <?php echo lang('office_title_one') ?> </title>

<div class = 'container p-3 my-3 border'>
<h3><?=$title ?></h3>
</div>


<div class = 'container p-3 my-3 border'>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo lang('office_name'); ?> </h4>
<p><?=$record->nev?></p>
<h4> <?php echo lang('office_capacity'); ?> </h4>
<p><?=$record->kapacitas?></p>

<?php echo anchor(base_url('office/list'), lang('back_to_list'), ['class' => 'btn btn-primary']); ?>
</div>