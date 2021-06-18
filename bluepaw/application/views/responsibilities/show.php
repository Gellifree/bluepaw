<?php $this->load->view('common/bootstrap'); ?>
<div class = 'container p-3 my-3 border'>
<h3><?=$title ?></h3>
</div>


<div class = 'container p-3 my-3 border'>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo lang('responsibility_name'); ?> </h4>
<p><?=$record->nev?></p>
<h4> <?php echo lang('description'); ?> </h4>
<p><?=$record->leiras?></p>

<?php echo anchor(base_url('responsibilities/list'), lang('back_to_list'), ['class' => 'btn btn-primary']); ?>
</div>