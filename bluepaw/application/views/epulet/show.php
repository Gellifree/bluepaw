<h3><?=$title ?></h3>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo lang('building_name'); ?> </h4>
<p><?=$record->megnevezes?></p>
<h4> <?php echo lang('building_type'); ?> </h4>
<p><?=($record->tipus == NULL ? lang('no_description_found') : $record->tipus)?></p>

<?php echo anchor(base_url('epulet/list'), lang('back_to_list')); ?>