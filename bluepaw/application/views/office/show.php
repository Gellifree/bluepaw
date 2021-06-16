<?php $this->load->view('common/bootstrap'); ?>

<h3><?=$title ?></h3>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo 'Iroda neve'; ?> </h4>
<p><?=$record->nev?></p>
<h4> <?php echo 'Iroda kapacitása'; ?> </h4>
<p><?=$record->kapacitas?></p>

<?php echo anchor(base_url('office/list'), lang('back_to_list')); ?>