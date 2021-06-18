<?php $this->load->view('common/bootstrap'); ?>
<div class = 'container p-3 my-3 border'>
<h3><?=$title ?></h3>
</div>

<div class = 'container p-3 my-3 border'>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo lang('employee_name'); ?> </h4>
<p><?=$record->nev?></p>

<?php echo anchor(base_url('employee/list'), lang('back_to_list'), ['class' => 'btn btn-primary']); ?>
</div>