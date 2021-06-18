<?php $this->load->view('common/bootstrap'); ?>

<h3><?=$title ?></h3>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo lang('position_name'); ?> </h4>
<p><?=$record->nev?></p>
<h4> <?php echo lang('description'); ?> </h4>
<p><?=$record->leiras?></p>
<h4> <?php echo lang('position_payment'); ?> </h4>
<p><?=$record->fizetes?></p>

<?php echo anchor(base_url('position/list'), lang('back_to_list')); ?>