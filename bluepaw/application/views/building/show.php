<?php $this->load->view('common/bootstrap'); ?>

<h3><?=$title ?></h3>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo 'Épület neve' ?> </h4>
<p><?=$record->nev?></p>
<h4> <?php echo lang('description'); ?> </h4>
<p><?=($record->leiras == NULL ? lang('no_description_found') : $record->leiras)?></p>

<?php echo anchor(base_url('building/list'), lang('back_to_list')); ?>