<h3><?=$title ?></h3>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo 'Régió neve'; ?> </h4>
<p><?=$record->nev?></p>
<h4> <?php echo 'Régió leíása'; ?> </h4>
<p><?=$record->leiras?></p>
<h4> <?php echo 'Fizetés'; ?> </h4>
<p><?=$record->fizetes?></p>

<?php echo anchor(base_url('position/list'), lang('back_to_list')); ?>