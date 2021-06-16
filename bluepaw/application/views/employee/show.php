<?php $this->load->view('common/bootstrap'); ?>

<h3><?=$title ?></h3>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo 'Alkalmazott neve'; ?> </h4>
<p><?=$record->nev?></p>

<?php echo anchor(base_url('employee/list'), lang('back_to_list')); ?>